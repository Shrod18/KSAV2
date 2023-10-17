<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AvisModel extends Model
{
    protected $table = "avis";
    protected $primaryKey = "IDAVIS";

    protected $returnType = "array";
    protected $useSoftDeletes = false;

    protected $allowedFields = ["IDAVIS", "IDRESERVATION", "IDVOYAGE", "IDCLIENT", "TRANSFERT", "HOTEL", "RESTAURATION", "SERVICEACCUEIL", "ANIMATION", "EXCURSIONSGUIDE", "TRANSPORTAERIEN", "TRANSPORTCAR", "THALASSOSPA", "CROISIERE", "POSITIFS", "NEGATIF", "DATEAVIS"];

}