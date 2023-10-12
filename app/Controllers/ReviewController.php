<?php

namespace App\Controllers;

use App\Models\AvisModel;

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

        return view("pages/review/list", [ "page" => "review", "reviews" => $reviews]);

    }

    public function viewAdd(): string
    {
        return view("pages/review/add");
    }
}
