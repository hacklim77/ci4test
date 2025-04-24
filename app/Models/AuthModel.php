<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'idadmin';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'email', 'password', 'role_id', 'status', 'last_active'];

}