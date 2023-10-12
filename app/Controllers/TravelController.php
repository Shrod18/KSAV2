<?php

namespace App\Controllers;

use App\Models\VoyageModel;

class TravelController extends BaseController
{
    public function viewList(): string
    {
        $manager = new VoyageModel();
        $travels = $manager->findAll();

        $builder = $manager->builder();
        $builder->select("modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, voyage.IDVOYAGE AS ID_VOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE, typevoyage.IDTYPEVOYAGE AS ID_TYPEVOYAGE, typevoyage.LIBELLE AS LIBELLE_TYPEVOYAGE, modelevoyage.DESTINATION AS DESTINATION_MODELEVOYAGE, voyage.DATEDEPART AS DATEDEPART_VOYAGE, modelevoyage.DESCRIPTION AS DESCRIPTION_MODELEVOYAGE");
        $builder->join("modelevoyage", "modelevoyage.IDTYPEVOYAGE = voyage.IDVOYAGE", "left");
        $builder->join("typevoyage", "modelevoyage.IDTYPEVOYAGE = typevoyage.IDTYPEVOYAGE", "left");
        
        $models = $builder->get()->getResult();

        return view("pages/travel/list", [ "page" => "instanceTravel", "travels" => $travels]);

    }

    public function viewAdd(): string
    {
        return view("pages/travel/add");
    }
}
