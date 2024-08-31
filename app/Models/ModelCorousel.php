<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCorousel extends Model
{
    protected $table      = 'courousel';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'img',
        'tipe'
    ];
}
