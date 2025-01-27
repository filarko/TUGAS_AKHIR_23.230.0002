<?php

namespace App\Models;

use CodeIgniter\Model;

class supplierModel extends Model
{
    protected $table            = 'supplier';
    protected $primaryKey       = 'id_supplier';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_supplier','nama_supplier','alamat','foto','no_telp','user_id'];
    protected $useTimestamps = false;
   
}
