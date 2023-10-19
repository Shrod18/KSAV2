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
        $manager = new AvisModel();

        $data = [
            "ID_RESERVATION" => intval($this->request->getPost("reservation-review")),
            "ID_VOYAGE" => intval($this->request->getPost("id_travel-review")),
            "ID_CLIENT" => intval($this->request->getPost("client-review")),
            "TRANFERT" => $this->request->getPost("transfert-review"),
            "HOTEL" => $this->request->getPost("hotel-review"),
            "RESTAURATION" => $this->request->getPost("restauration-review"),
            "SERVICEACCUEIL" => $this->request->getPost("service_accueil-review"),
            "ANIMATION" => $this->request->getPost("animation-review"),
            "EXCURSIONSGUIDE" => $this->request->getPost("excursions_guide-review"),
            "TRANSPORTAERIEN" => $this->request->getPost("transport_aerien-review"),
            "TRANSPORTCAR" => $this->request->getPost("transport_car-review"),
            "THALASSOSPA" => $this->request->getPost("thalasso_spa-review"),
            "CROISIERE" => $this->request->getPost("croisiere-review"),
            "POSITIFS" => $this->request->getPost("positifs-review"),
            "NEGATIF" => $this->request->getPost("negatifs-review")
        ];

        $manager->insert($data);

        return redirect()->to(url_to("reviewViewList"));
    }

}

