<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_user','email','password','name','role','created_at','foto','is_active','no_telp','username'];
    protected $useTimestamps = false;
   
}
