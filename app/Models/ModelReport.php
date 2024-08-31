<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelReport extends Model
{
    protected $table      = 'report';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'namaskin',
        'keterangan',
        'report_time',
        'is_done'
    ];
}
