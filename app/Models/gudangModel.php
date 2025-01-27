<?php

namespace App\Models;

use CodeIgniter\Model;

class gudangmodel extends Model
{
    protected $table            = 'gudang';
    protected $primaryKey       = 'id_gudang';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_gudang','nama_gudang','user_id'];
    protected $useTimestamps = false;
 
    
}
