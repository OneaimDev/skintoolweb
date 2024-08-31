<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSistem extends Model
{
    protected $table      = 'sistem';
    protected $primaryKey = 'id';
    protected $allowedFields= [
        'id',
        'mainads',
        'backupads',
        'intermain',
        'interbackup',
        'rewardmain',
        'rewardbackup',
        'bannermain',
        'bannerbackup',
        'nativemain',
        'nativebackup',
        'openmain',
        'openbackup',
        'protectapp',
        'interval'
    ];
}
