<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class TourOperateurModel extends Model
{
    protected $table = "touroperateur";
    protected $primaryKey = "IDTOUROPERATEUR";

    protected $returnType = "array";
    protected $useSoftDeletes = false;

    protected $allowedFields = ["IDTOUROPERATEUR", "LIBELLE"];

}
