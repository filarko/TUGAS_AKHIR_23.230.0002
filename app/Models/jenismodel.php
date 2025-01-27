<?php

namespace App\Models;

use CodeIgniter\Model;

class jenisModel extends Model
{
    protected $table            = 'jenis';
    protected $primaryKey       = 'id_jenis';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_jenis','nama_jenis','user_id'];
    protected $useTimestamps = false;
   
}
