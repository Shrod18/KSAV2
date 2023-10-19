<?php

namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\ModeleVoyageModel;
use App\Models\VoyageModel;
use App\Models\ClientModel;
use CodeIgniter\HTTP\RedirectResponse;

class ReviewController extends BaseController
{
    public function viewList(): string
    {
        $manager = new AvisModel();
        $builder = $manager->builder();
        $builder->select("avis.IDRESERVATION AS ID_RESERVATION, avis.DATEAVIS AS DATE_AVIS, client.IDCLIENT AS ID_CLIENT, client.NOM AS NOM_CLIENT, client.PRENOM AS PRENOM_CLIENT, voyage.IDVOYAGE AS ID_VOYAGE, voyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE");
        $builder->join("client", "client.IDCLIENT = avis.IDCLIENT", "left");
        $builder->join("voyage", "voyage.IDVOYAGE = avis.IDVOYAGE", "left");
        $builder->join("modelevoyage", "modelevoyage.IDMODELEVOYAGE = voyage.IDMODELEVOYAGE", "left");
        $reviews = $builder->get()->getResultArray();

        return view("pages/review/list", [
            "page" => "review", 
            "reviews" => $reviews
        ]);

    }

    /**
     * Permet d'afficher le formulaire d'ajout d'un avis
     *
     * @return string
     */
    public function viewAdd(): string
    {
        $manager = new ModeleVoyageModel();
        $travels = $manager->findAll();

        $manager = new ClientModel();
        $customers = $manager->findAll();

        return view("pages/review/action", [
            "page" => "review",
            "action" => "add",
            "travels" => $travels,
            "customers" => $customers
        ]);
    }

    /**
     * Fonction qui permet d'ajouter un avis
     * 
     * @return string
     */
    public function add(): RedirectResponse
    {
        $columns = [
            1 => "TRANSFERT",
            2=> "HOTEL",
            3 => "RESTAURATION",
            4 => "SERVICEACCUEIL",
            5 => "ANIMATION",
            6 => "EXCURSIONSGUIDE",
            7 => "TRANSPORTAERIEN",
            8 => "TRANSPORTCAR",
            9 => "THALASSOSPA",
            10 => "CROISIERE"
        ];

        $manager = new ModeleVoyageModel();
        $services = $manager->getServices(intval($this->request->getPost("travel-review")));

        $manager = new AvisModel();

        $data = [
            "IDRESERVATION" => intval($this->request->getPost("reservation-review")),
            "IDVOYAGE" => intval($this->request->getPost("id_travel-review")),
            "IDCLIENT" => intval($this->request->getPost("client-review")),
            "POSITIFS" => $this->request->getPost("positifs-review"),
            "NEGATIFS" => $this->request->getPost("negatifs-review")
        ];

        if ($services != null || $services != []) {
            foreach ($services as $service) {
                $data[$columns[$service["ID_PRESTATION"]]] = intval($this->request->getPost("input_" . $service["ID_PRESTATION"] + "-review"));
            }
        }

        $manager->insert($data);

        return redirect()->to(url_to("reviewViewList"));
    }

}

