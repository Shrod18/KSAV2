<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function view()
    {
        echo view('templates/header');
        echo view('pages/login');
        echo view('templates/footer');
    }
}
