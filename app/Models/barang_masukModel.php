<?php

namespace App\Models;

use CodeIgniter\Model;

class barang_masukModel extends Model
{
    protected $table            = 'barang_masuk';
    protected $primaryKey       = 'id_barang_masuk';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_barang_masuk','barang_id','jumlah_masuk','tanggal_masuk','user_id'];
    protected $useTimestamps = false;
   
}
