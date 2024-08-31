<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;


class Funcs extends BaseController
{
   public function postOrientation(){
       $orientation = $this->request->getVar('orientation');
       setcookie('orientation',$orientation,time() + (86400 * 30), "/");
       $data = [
           'status' => '200OK',
           ];
        echo(json_encode($data));
   }
   public function getDestroy(){
       session_destroy();
   }
}
