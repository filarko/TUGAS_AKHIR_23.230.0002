<?php

namespace App\Models;

use CodeIgniter\Model;

class barang_keluarModel extends Model
{
    protected $table            = 'barang_keluar';
    protected $primaryKey       = 'id_barang_keluar';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_barang_keluar','barang_id','jumlah_keluar','lokasi','tanggal_keluar','user_id'];
    protected $useTimestamps = false;
   
}
