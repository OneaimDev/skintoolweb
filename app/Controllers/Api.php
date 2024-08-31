<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelCategories;
use App\Models\ModelPack;
use App\Models\ModelSistem;
use App\Models\ModelCorousel;
use App\Models\ModelPengumuman;
use App\Models\ModelReport;

class Api extends BaseController
{
    use ResponseTrait;
    public function __construct(){
        $this->categories = new ModelCategories();
        $this->pack = new ModelPack();
        $this->sistem = new ModelSistem();
        $this->corousel = new ModelCorousel();
        $this->pengumuman = new ModelPengumuman();
        $this->laporan = new ModelReport();
    }
    /*public function postCategoriesdata(){
        //$data = $this->categories->select('id,categories_name,CONCAT("'.base_url().'",thumb) as thumb')->findAll();
        //return $this->respond($data);
    }*/
    public function postReportskin(){
        $namaskin = $this->request->getVar('namaskin');
        $keterangan = $this ->request->getVar('keterangan');
    
        $this->laporan->insert([
            'namaskin' => $namaskin,
            'keterangan' => $keterangan
        ]);
                
        $data['status'] = true;
        $data['result'] = "berhasil";

        return $this->respond($data);
    }
    public function postCategories(){
       $data = [
           'data' => $this->categories->whereNotIn('categories_name', ['Fix Bug', 'Original Skin'])->findAll()
           ];
        return $this->respond($data);
    }
    public function postSkinBaru(){
        $data = [
            'data' => $this->pack->orderBy('created_at', 'DESC')->LIMIT('10')->find()
        ];
            
        return $this->respond($data);
    }
    public function postPengumuman(){
        $data = [
            'data' => $this->pengumuman->orderBy('created_at', 'DESC')->findAll()
        ];
            
        return $this->respond($data);
    }
    public function postPack(){
        $data = [
            'data' => $this->pack->findAll()
        ];
            
        return $this->respond($data);
    }
    public function postSearchpack(){
        $search = $this->request->getVar('search');
        $data = [
           'data' => $this->pack->like('title',$search)->find()
        ];

        return $this->respond($data);
    }
    public function postFilterpack(){
        $cat = $this->request->getVar('categories');
        $data = [
           'data' => $this->pack->where('cat_name_id',$cat)->find()
        ];
        
        return $this->respond($data);
    }
    public function postSistem(){
        $data = [
            'data' => $this->sistem->findAll()
        ];

        return $this->respond($data);
    }
    
    public function postCorousel(){
        $data = [
            'data' => $this->corousel->findAll()
        ];

        return $this->respond($data);
    }
}
