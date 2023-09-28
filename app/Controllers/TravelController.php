<?php

namespace App\Controllers;

class TravelController extends BaseController
{
    public function viewList(): string
    {
        return view("pages/travel/list");
    }

    public function viewAdd(): string
    {
        return view("pages/travel/add");
    }
}
