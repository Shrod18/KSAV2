<?php

namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\VoyageModel;
use App\Models\ClientModel;
use CodeIgniter\HTTP\RedirectResponse;

class ReviewController extends BaseController
{
    public function viewList(): string
    {
        $manager = new AvisModel();
        $reviews = $manager->findAll();

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
        $manager = new VoyageModel();
        $builder = $manager->builder();
        $builder->select("modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, voyage.IDVOYAGE AS ID_VOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE, voyage.DATEDEPART AS DATEDEPART_VOYAGE");
        $builder->join("modelevoyage", "modelevoyage.IDMODELEVOYAGE = voyage.IDVOYAGE", "left");

        $travels = $builder->get()->getResultArray();

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
            "IDMODELEVOYAGE" => intval($this->request->getPost("review")),
            "DATEDEPART" => $this->request->getPost("date_travel-review")
        ];

        $manager->insert($data);

        return redirect()->to(url_to("reviewViewList"));
    }

}

