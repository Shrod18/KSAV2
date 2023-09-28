<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ModeleVoyageModel extends Model
{
    protected $table = "modelevoyage";
    protected $primaryKey = "IDMODELEVOYAGE";

    protected $returnType = "array";
    protected $useSoftDeletes = false;

    protected $allowedFields = ["IDMODELEVOYAGE", "NOM", "DESCRIPTION", "DESTINATION"];

}