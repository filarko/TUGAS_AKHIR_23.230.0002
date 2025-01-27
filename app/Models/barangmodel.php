<?php

namespace App\Models;

use CodeIgniter\Model;

class barangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_barang','nama_barang','jenis_id','satuan_id','gudang_id','stok','user_id','harga_barang','image'];
    protected $useTimestamps = false;
   
}
