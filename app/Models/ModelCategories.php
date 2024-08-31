<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCategories extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'categories_name',
        'created_at',
        'thumb'
    ];
}
