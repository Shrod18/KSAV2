<?php

namespace App\Controllers;

use App\Models\ModeleVoyageModel;
use App\Models\TypeVoyageModel;
use CodeIgniter\HTTP\RedirectResponse;

class ModelTravelController extends BaseController
{
    public function viewList(): string
    {
        $manager = new ModeleVoyageModel();
        $builder = $manager->builder();
        $builder->select("modelevoyage.IDMODELEVOYAGE AS ID_MODELEVOYAGE, modelevoyage.NOM AS NOM_MODELEVOYAGE, modelevoyage.DESCRIPTION AS DESCRIPTION_MODELEVOYAGE, modelevoyage.DESTINATION AS DESTINATION_MODELEVOYAGE, typevoyage.IDTYPEVOYAGE AS ID_TYPEVOYAGE, typevoyage.LIBELLE AS LIBELLE_TYPEVOYAGE, typevoyage.DESCRIPTION AS DESCRIPTION_TYPEVOYAGE");
        $builder->join("typevoyage", "modelevoyage.IDTYPEVOYAGE = typevoyage.IDTYPEVOYAGE", "left");
        $models = $builder->get()->getResult();

        return view("pages/travel/model/list", [ 
            "page" => "modelTravel", 
            "models" => $models 
        ]);
    }

    /**
     * @description Fonction que retourne la vue d'ajout d'un modèle de voyage
     * @return string
     */
    public function viewAdd(): string
    {
        $manager = new TypeVoyageModel();
        $typesVoyages = $manager->findAll();

        return view("pages/travel/model/action", [ 
            "page" => "modelTravel",
            "action" => "add", 
            "typesVoyages" => $typesVoyages 
        ]);
    }

    /**
     * @description Fonction qui permet d'ajouter un modèle de voyage
     * @return string
     */
    public function add(): RedirectResponse
    {
        $manager = new ModeleVoyageModel();

        $data = [
            "NOM" => $this->request->getPost("name_model-travel"),
            "IDTYPEVOYAGE" => intval($this->request->getPost("type_model-travel")),
            "DESTINATION" => $this->request->getPost("destination_model-travel"),
            "DESCRIPTION" => $this->request->getPost("description_model-travel")
        ];

        $manager->insert($data);

        return redirect()->to(url_to("modelTravelList"));
    }

    /**
     * @description Fonction que retourne la vue de modification d'un modèle de voyage
     * @param int $id
     * @return string
     */
    public function viewEdit(int $id): string
    {
        $manager = new ModeleVoyageModel();
        $data = $manager->find($id);

        $manager = new TypeVoyageModel();
        $typesVoyages = $manager->findAll();

        return view("pages/travel/model/action", [ 
            "page" => "modelTravel",
            "action" => "edit", 
            "id" => $id, 
            "data" => $data, 
            "typesVoyages" => $typesVoyages 
        ]);
    }

    /**
     * @description Fonction qui permet de modifier un modèle de voyage
     * @param int $id
     * @return string
     */
    public function edit(int $id): RedirectResponse
    {
        $manager = new ModeleVoyageModel();

        $data = [
            "NOM" => $this->request->getPost("name_model-travel"),
            "IDTYPEVOYAGE" => intval($this->request->getPost("type_model-travel")),
            "DESTINATION" => $this->request->getPost("destination_model-travel"),
            "DESCRIPTION" => $this->request->getPost("description_model-travel")
        ];

        $manager->update($id, $data);

        return redirect()->to(url_to("modelTravelList"));
    }

}
