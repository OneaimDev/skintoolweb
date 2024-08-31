<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelPack;
use App\Models\ModelCategories;

class Files extends BaseController
{
    public function __construct()
    {
        $this->files = new ModelPack();
        $this->categories = new ModelCategories();
    }
    
    public function getIndexMenu()
    {
        $categories = $this->categories;
        $data = [
            'categories' => $categories->findAll(),
            'pager' => $this->files->pager
        ];
        return view('files/menu',$data);
    }
    public function getIndex()
    {
        $cat = $this->request->getVar('categories');
        $catname = $this->categories->find($cat);
        $files = $this->files->where('cat_name_id',$cat)->orderby('id','asc');
        $data = [
            'files' => $files->paginate(10, 'files'),
            'pager' => $this->files->pager,
            'tipe' => $catname['categories_name'],
            'type' => $catname['categories_name'],
            'kategori' =>$cat
        ];
        return view('files/index',$data);
    }
    public function postDetail(){
        $idfile = $this->request->getVar('kode');
        $files = $this->files;
        $returndata = [
            'data' =>$files->where('id',$idfile)->findAll(),
        ];
        $data = [
            'data' => view('files/modaldetail',$returndata)
        ];
        echo json_encode($data);
    }
    
    public function postHapus(){
        $id = $this->request->getVar('idfiles');
        $this->files->delete($id);
                    $data = [
                        'sukses' => 'Sukses!, Data Terhapus!',
                    ];
        return json_encode($data);
    }
    
    public function postModal(){
        $id = $this->request->getVar('id');
        $categories = $this->categories->findAll();
        $data = $this->files->find($id);
        $data = [
            'aksi' => $this->request->getPost('aksi'),
            'categories' =>$categories,
            'data' =>$data,
            'url'=>'intro/edit',
        ];
        $msg = [
            'data' => view('files/modalformedit', $data)
        ];
        echo json_encode($msg);

    }
    
    public function postEdit(){
        $nama = $this->request->getVar('nama');
        $file = $this->request->getVar('file');
        $categories = $this->request->getVar('categories');
        $ukuran = $this->request->getVar('ukuran');
        $link = $this->request->getVar('link');
        $alt = $this->request->getVar('alt');
        $yt = $this->request->getVar('yt');
        $id = $this->request->getVar('id');
        $linkgambar = $this->request->getVar('linkgambar');
        $query = $this->files->update($id,[
                'cat_name_id' =>$categories,
                'title'=>$nama,
                'size' =>$ukuran,
                'thumbnail' =>$linkgambar,
                'link' =>$link,
                'namafile' =>$file,
                'linkmanual' =>$alt,
                'created_at' =>date('Y-m-d H:i:s'),
                'youtube' =>$yt,
            ]);
            
        $data = [
                'sukses' => 'Sukses!, Data Berhasil Diubah'
            ];

        return json_encode($data);
    }
    function postCari(){
        if($this->request->isAjax()){
            $k = $this->request->getPost('kode');
            $q= $this->files->like('title',$k)->orderby('title','asc');
            $d = [
                    'files' => $q->paginate(50, 'files'),
                    'pager' => $this->files->pager
            ];
            $data = [
                'view' => view('files/tblcari',$d)
            ];
            echo(json_encode($data));
            
        }
    }
}

