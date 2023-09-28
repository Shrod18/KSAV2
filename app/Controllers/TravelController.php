<?php

namespace App\Controllers;
use App\Models\ModeleVoyageModel;

class TravelController extends BaseController
{
    public function viewList(): string
    {
        $manager = new ModeleVoyageModel();
        $travels = $manager->findAll();

        return view("pages/travel/list", ["travels" => $travels]);
    }

    public function viewAdd(): string
    {
        return view("pages/travel/add");
    }
}
