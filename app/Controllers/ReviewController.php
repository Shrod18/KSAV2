<?php

namespace App\Controllers;

use App\Models\NoteModel;
use App\Models\ReservationModel;
use App\Models\AvisModel;
use App\Models\ModeleVoyageModel;
use App\Models\VoyageModel;
use App\Models\ClientModel;
use CodeIgniter\HTTP\RedirectResponse;

class ReviewController extends BaseController
{
    public function viewList(): string
    {
        $manager = new ReservationModel();
        $builder = $manager->builder();
        $builder->select("reservation.IDRESERVATION AS ID_RESERVATION, avis.DATEAVIS AS DATE_AVIS, client.IDCLIENT AS ID_CLIENT, client.NOM AS NOM_CLIENT, client.PRENOM AS PRENOM_CLIENT, voyage.IDVOYAGE AS ID_VOYAGE, voyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE");
        $builder->join("avis", "avis.IDAVIS = reservation.IDAVIS", "right");
        $builder->join("client ", "client.IDCLIENT = reservation.IDCLIENT");
        $builder->join("voyage  ", "voyage.IDVOYAGE = reservation.IDVOYAGE");
        $builder->join("modelevoyage", "modelevoyage.IDMODELEVOYAGE = voyage.IDMODELEVOYAGE");
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
            "POINTSPOSITIFS" => $this->request->getPost("positifs-review"),
            "POINTSNEGATIFS" => $this->request->getPost("negatifs-review"),
            "DATEAVIS" => date("Y-m-d")
        ];
        $manager->insert($data);

        $id = $manager->getInsertID();

        $manager = new ReservationModel();
        $data = [
            "IDRESERVATION" => $this->request->getPost("reservation-review"),
            "IDVOYAGE" => $this->request->getPost("id_travel-review"),
            "IDCLIENT" => $this->request->getPost("client-review"),
            "IDAVIS" => $id
        ];
        $manager->insert($data);

        $manager = new NoteModel();
        $data = [];
        foreach ($this->request->getPost() as $key => $value) {
            if (str_contains($key, "note_")) {
                $service = explode("*", $key)[1];
                $data[] = [
                    "IDPRESTATION" => $service,
                    "IDAVIS" => $id,
                    "NOTE" => $value
                ];
            }
        }
        $manager->insertBatch($data);

        return redirect()->to(url_to("reviewViewList"));
    }

}

