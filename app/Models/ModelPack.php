<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPack extends Model
{
    protected $table      = 'skin_pack';
    protected $primaryKey = 'id';
    protected $allowedFields= [
        'cat_name_id',
        'title',
        'size',
        'thumbnail',
        'link',
        'namafile',
        'linkmanual',
        'youtube',
        'hapusfile',
        'created_at'
    ];
}
