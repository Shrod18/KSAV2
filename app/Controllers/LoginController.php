<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends BaseController
{
    const LOGIN = "admin";
    const PASSWORD = "admin";

    public function view(): string
    {
        return view("pages/login");
    }

    /**
     * Fonction de connexion à l'application (POST)
     */
    public function login(): RedirectResponse
    {
        $login = $this->request->getPost("login");
        $password = $this->request->getPost("password");

        if ($login == self::LOGIN && $password == self::PASSWORD) {
            session()->set("isLoggedIn", true);
            return redirect()->to(url_to("homeView"));
        } else {
            session()->setFlashdata("error", "Identifiants incorrects");
            return redirect()->to(url_to("loginView"));
        }
    }

    /**
     * Fonction de déconnexion de l'application
     */
    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to(url_to("loginView"));
    }
}
