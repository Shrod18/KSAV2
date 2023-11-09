<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = "avis";
    protected $primaryKey = "IDRESERVATION";

    protected $returnType = "array";
    protected $useSoftDeletes = false;

    protected $allowedFields = ["IDRESERVATION", "IDVOYAGE", "IDCLIENT", "IDAVIS"];

}