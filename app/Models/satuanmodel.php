<?php

namespace App\Models;

use CodeIgniter\Model;

class satuanModel extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_satuan','nama_satuan','user_id'];
    protected $useTimestamps = false;
   
}
