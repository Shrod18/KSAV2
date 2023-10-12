<?php

namespace App\Controllers;

use App\Models\ModeleVoyageModel;

class ModelTravelController extends BaseController
{
    public function viewList(): string
    {
        $manager = new ModeleVoyageModel();
        $builder = $manager->builder();
        $builder->select("modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE, modelevoyage.DESCRIPTION AS DESCRIPTION_MODELEVOYAGE, modelevoyage.DESTINATION AS DESTINATION_MODELEVOYAGE, typevoyage.IDTYPEVOYAGE AS ID_TYPEVOYAGE, typevoyage.LIBELLE AS LIBELLE_TYPEVOYAGE, typevoyage.DESCRIPTION AS DESCRIPTION_TYPEVOYAGE");
        $builder->join("typevoyage", "modelevoyage.IDTYPEVOYAGE = typevoyage.IDTYPEVOYAGE", "left");
        $models = $builder->get()->getResult();

        return view("pages/travel/model/list", [ "page" => "modelTravel", "models" => $models ]);
    }

    public function viewAdd(): string
    {
        return view("pages/travel/model/action", [ "page" => "modelTravel", "action" => "add" ]);
    }
}
