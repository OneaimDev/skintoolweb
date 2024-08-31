<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelPengumuman;

class Pengumuman extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->categories = new ModelPengumuman();
    }
    public function getIndex()
    {
        $categories = $this->categories;
        $data = [
            'categories' => $categories->paginate(10, 'categories'),
            'pager' => $this->categories->pager
        ];
        return view('pengumuman/index',$data);
    }
    public function postTambah(){
        if ($this->request->isAJAX()) {
            $namaitem = $this->request->getVar('namaitem');
            
            $img= $_FILES['img'] ;

            $uploadOk = 1;

                     $this->categories->insert([
                            'img'=>"",
                            'isi'=>$namaitem,
                            ]);
                        $msg = [
                            'sukses' => 'Kategori berhasil disimpan',
                            'img_stat' => ""
                        ];
            echo json_encode($msg);
        }
    }
    public function postEdit(){
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $namaitem = $this->request->getVar('namaitem');
            $img = $_FILES['img']['name'];
            $rowitem = $this->categories->find($id);
            if($img!=null){
                $imgloc = substr($rowitem['img'],strpos($rowitem['img'],"Gambar/"));
                if(file_exists($imgloc)){
                    unlink($imgloc);
                }
                $filename = str_replace(' ', '-', $namaitem);
                $fileimg = $this->request->getFile('img');
                $fileimg->move('Gambar/Pengumuman',$filename.'.'.$fileimg->getExtension());
                $pathimg = base_url('Gambar/Pengumuman/'.$fileimg->getName());
            }else{
                $pathimg = base_url($rowitem['img']);
            }
            $this->categories->update($id,[
                'isi' =>$namaitem,
                'img'=>$pathimg
                ]);
            $msg = [
                'sukses' => 'Kategori berhasil disimpan',
                'imgex' =>$pathimg
                ];
            echo json_encode($msg);
        }
    }
    
    public function postHapus(){
        if ($this->request->isAJAX()) {
            $idKategori = $this->request->getVar('idKategori');
            $this->categories->delete($idKategori);
            $msg = [
                'sukses' => 'Data Dihapus'
            ];
            echo json_encode($msg);
        }
    }
    
    public function postModal(){
        $tipe = $this->request->getVar('fungsi');
        if($tipe == 'tambah'){
            $categories = $this->categories->findAll();
            $data = [
                'aksi' => $this->request->getPost('aksi'),
                'categories' =>$categories
            ];
            $msg = [
                'data' => view('pengumuman/modalformtambah', $data)
            ];

            echo json_encode($msg);
        }else if($tipe == 'edit'){
            $categories = $this->categories->findAll();
            $id = $this->request->getVar('id');
            $item = $this->categories->find($id);
            $data = [
                'aksi' => $this->request->getPost('aksi'),
                'categories' =>$categories,
                'item' => $item
            ];
            $msg = [
                'data' => view('pengumuman/modalformedit', $data)
            ];

            echo json_encode($msg);
        }


    }
}
