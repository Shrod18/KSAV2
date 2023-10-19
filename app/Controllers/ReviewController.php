<?php

namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\ModeleVoyageModel;
use App\Models\ClientModel;

class ReviewController extends BaseController
{
    public function viewList(): string
    {
        $manager = new AvisModel();
        $reviews = $manager->findAll();

        // $builder = $manager->builder();
        // $builder->select("modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, voyage.IDVOYAGE AS ID_VOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE, typevoyage.IDTYPEVOYAGE AS ID_TYPEVOYAGE, typevoyage.LIBELLE AS LIBELLE_TYPEVOYAGE, modelevoyage.DESTINATION AS DESTINATION_MODELEVOYAGE, voyage.DATEDEPART AS DATEDEPART_VOYAGE, modelevoyage.DESCRIPTION AS DESCRIPTION_MODELEVOYAGE");
        // $builder->join("modelevoyage", "modelevoyage.IDTYPEVOYAGE = voyage.IDVOYAGE", "left");
        // $builder->join("typevoyage", "modelevoyage.IDTYPEVOYAGE = typevoyage.IDTYPEVOYAGE", "left");

        // $reviews = $builder->get()->getResult();

        return view("pages/review/list", ["page" => "review", "reviews" => $reviews]);

    }

    /**
     * Permet d'afficher le formulaire d'ajout d'un avis
     *
     * @return string
     */
    public function viewAdd(): string
    {
        $manager = new ModeleVoyageModel();
        $reviews = $manager->findAll();
        $voyages = $manager->findAll();

        return view("pages/review/action", [
            "page" => "reviews",
            "action" => "add",
            "reviews" => $reviews
        ]);
    }


    /**
     * Fonction qui permet d'ajouter un voyage
     * 
     * @return string
     */
    public function add(): RedirectResponse
    {
        $manager = new AvisModel();

        $data = [
            "IDMODELEVOYAGE" => intval($this->request->getPost("review")),
            "DATEDEPART" => $this->request->getPost("date_travel")
        ];

        $manager->insert($data);

        return redirect()->to(url_to("reviewViewList"));
    }

}

