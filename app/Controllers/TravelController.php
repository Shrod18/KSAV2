<?php

namespace App\Controllers;

use App\Models\VoyageModel;
use App\Models\ModeleVoyageModel;
use CodeIgniter\HTTP\RedirectResponse;

class TravelController extends BaseController
{
    public function viewList(): string
    {
        $manager = new VoyageModel();
        $travels = $manager->findAll();

        $builder = $manager->builder();
        $builder->select("modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, voyage.IDVOYAGE AS ID_VOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE, typevoyage.IDTYPEVOYAGE AS ID_TYPEVOYAGE, typevoyage.LIBELLE AS LIBELLE_TYPEVOYAGE, modelevoyage.DESTINATION AS DESTINATION_MODELEVOYAGE, voyage.DATEDEPART AS DATEDEPART_VOYAGE, modelevoyage.DESCRIPTION AS DESCRIPTION_MODELEVOYAGE");
        $builder->join("modelevoyage", "modelevoyage.IDMODELEVOYAGE = voyage.IDMODELEVOYAGE", "left");
        $builder->join("typevoyage", "modelevoyage.IDTYPEVOYAGE = typevoyage.IDTYPEVOYAGE", "left");
        
        $travels = $builder->get()->getResult();

        // var_dump($travels);
        // die();

        return view("pages/travel/list", [ "page" => "instanceTravel", "travels" => $travels]);

    }

    /**
     * @description Fonction que retourne la vue d'ajout d'un modèle de voyage
     * @return string
     */
    public function viewAdd(): string
    {
        $manager = new ModeleVoyageModel();
        $modelsTravels = $manager->findAll();

        return view("pages/travel/action", [ 
            "page" => "travel",
            "action" => "add", 
            "modelsTravels" => $modelsTravels 
        ]);
    }

    /**
     * @description Fonction qui permet d'ajouter un modèle de voyage
     * @return string
     */
    public function add(): RedirectResponse
    {
        $manager = new VoyageModel();

        $data = [
            "IDMODELEVOYAGE" => intval($this->request->getPost("model_travel")),
            "DATEDEPART" => $this->request->getPost("date_travel")
        ];

        $manager->insert($data);

        return redirect()->to(url_to("travelViewList"));
    }

    /**
     * @description Fonction que retourne la vue de modification d'un modèle de voyage
     * @param int $id
     * @return string
     */
    public function viewEdit(int $id): string
    {
        $manager = new VoyageModel();
        $data = $manager->find($id);

        $manager = new ModeleVoyageModel();
        $modelsTravels = $manager->findAll();

        return view("pages/travel/action", [ 
            "page" => "modelTravel",
            "action" => "edit", 
            "id" => $id, 
            "data" => $data, 
            "modelsTravels" => $modelsTravels 
        ]);
    }

    /**
     * @description Fonction qui permet de modifier un modèle de voyage
     * @param int $id
     * @return string
     */
    public function edit(int $id): RedirectResponse
    {
        $manager = new VoyageModel();

        $data = [
            "IDMODELEVOYAGE" => intval($this->request->getPost("model_travel")),
            "DATEDEPART" => $this->request->getPost("date_travel")
        ];

        $manager->update($id, $data);

        return redirect()->to(url_to("travelViewList"));
    }

    

}
