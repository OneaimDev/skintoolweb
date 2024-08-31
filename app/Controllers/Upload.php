<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelPack;
use App\Models\ModelCategories;
class Upload extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->files = new ModelPack();
        $this->item = new ModelCategories();
    }
    public function getIndex()
    {
        $item = $this->item->findAll();
        $data = [
            'item' => $item
        ];
        return view('upload/index',$data);
    }

    function postSimpandata() {
        if ($this->request->isAJAX()) {
            $idkat = $this->request->getVar('item_cat');
            $idkat = intval($idkat);
            $namaskin = $this->request->getVar('namaskin');
            $sizefile = $this->request->getVar('sizefile');
            $namafile = $this->request->getVar('namafile');
            $link = $this->request->getVar('link');
            $linkmanual = $this->request->getVar('linkmanual');
            $youtube = $this->request->getVar('youtube');
            $hapusfile = $this->request->getVar('hapusfile');
            $pilihan = $this->request->getVar('pilihan');
            
            if($pilihan == 'link'){
                $img = $this->request->getVar('linkgambar');
                $this->files->insert([
                    'cat_name_id' => $idkat,
                    'title' => $namaskin,
                    'size' => $sizefile,
                    'thumbnail' => $img,
                    'link' => $link,
                    'namafile' => $namafile,
                    'linkmanual' => $linkmanual,
                    'youtube' => $youtube,
                    'hapusfile' => $hapusfile
                ]);
    
                $data = [
                    'sukses' =>'Link Berhasil Disimpan',
                    'name' =>$namaskin,
                    'response' =>$link,
                    'test'=>$img
                ];
        
            }else if($pilihan == 'gambar'){
                $fileUploadGambar = $_FILES['linkgambar']['name'];
                if ($fileUploadGambar != NULL) {
                    $namaFileGambar = "$namaskin-$idkat";
                    $fileGambar = $this->request->getFile('linkgambar');
                    $fileGambar->move('Gambar', $namaFileGambar . '.' . $fileGambar->getExtension());
                    $pathGambar = base_url().'Gambar/' . $fileGambar->getName();
                } else {
                    $pathGambar = 'gagal';
                }
                $this->files->insert([
                    'cat_name_id' => $idkat,
                    'title' => $namaskin,
                    'size' => $sizefile,
                    'thumbnail' => $pathGambar,
                    'link' => $link,
                    'namafile' => $namafile,
                    'linkmanual' => $linkmanual,
                    'youtube' => $youtube,
                    'hapusfile' => $hapusfile
                ]);
                $data = [
                    'sukses' =>'Gambar Berhasil Di Upload',
                    'name' =>$namaskin,
                    'response' =>$link,
                    'test'=>$pathGambar
                ];
            }
            
    

            echo json_encode($data);
        } else {
            return view('errors/html/error_404');
        }
    }

}
