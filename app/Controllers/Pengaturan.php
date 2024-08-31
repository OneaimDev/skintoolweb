<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelSistem;

class Pengaturan extends BaseController
{
    public function __construct()
    {
        $this->sistem = new ModelSistem();
    }
    public function getIndex()
    {
        $sistem = $this->sistem->find();
        $data = [
            'sistem' => $sistem,
        ];
        return view('pengaturan/index',$data);
    }
    function postSimpandata(){
        if ($this->request->isAJAX()) {
            $mainads = $this->request->getVar('mainads');
            $backupads = $this->request->getVar('backupads');
            $intermain = $this->request->getVar('intermain');
            $interbackup = $this->request->getVar('interbackup');
            $rewardmain = $this->request->getVar('rewardmain');
            $rewardbackup = $this->request->getVar('rewardbackup');
            $bannermain = $this->request->getVar('bannermain');
            $bannerbackup = $this->request->getVar('bannerbackup');
            $nativemain = $this->request->getVar('nativemain');
            $nativebackup = $this->request->getVar('nativebackup');
            $openmain = $this->request->getVar('openmain');
            $openbackup = $this->request->getVar('openbackup');
            $protectapp = $this->request->getVar('protectapp');
            $interval = $this->request->getVar('interval');
            $this->sistem->update('1',[
                                        'mainads'=>$mainads,
                                        'backupads'=>$backupads,
                                        'intermain'=>$intermain,
                                        'interbackup'=>$interbackup,
                                        'rewardmain'=>$rewardmain,
                                        'rewardbackup'=>$rewardbackup,
                                        'bannermain'=>$bannermain,
                                        'bannerbackup'=>$bannerbackup,
                                        'nativemain'=>$nativemain,
                                        'nativebackup'=>$nativebackup,
                                        'openmain'=>$openmain,
                                        'openbackup'=>$openbackup,
                                        'protectapp'=>$protectapp,
                                        'interval'=>$interval]);
            $msg = [
                'result' =>'sukses',
                ];
                echo json_encode($msg);
        } else {
            return (view('errors/html/error_404'));
        }
    }

}
