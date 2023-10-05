<?php

namespace App\Controllers;

use App\Models\ModeleVoyageModel;

class ModelTravelController extends BaseController
{
    public function viewList(): string
    {
        $manager = new ModeleVoyageModel();
        $models = $manager->findAll();

        return view("pages/travel/model/list", ["models" => $models]);
    }

    public function viewAdd(): string
    {
        return view("pages/travel/add");
    }
}
