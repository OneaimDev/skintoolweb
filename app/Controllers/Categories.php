<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelCategories;

class Categories extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->categories = new ModelCategories();
    }
    public function getIndex()
    {
        $categories = $this->categories;
        $data = [
            'categories' => $categories->paginate(10, 'categories'),
            'pager' => $this->categories->pager
        ];
        return view('categories/index',$data);
    }
    public function postTambah(){
        if ($this->request->isAJAX()) {
            $namakategori = $this->request->getVar('namakategori');
            $ch = curl_init();
            //getting direct link
            curl_setopt($ch,CURLOPT_URL ,"https://api.gofile.io/createFolder/");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS,"parentFolderId=3850e296-3c36-486b-817c-8f3c7b41dcb3&token=ybJ4rfryAMZwf99paoFk2wqIsEgptFNU&folderName=".$namakategori);
            $response = curl_exec($ch);
            $res = json_decode($response,true);
            $gofileId = $res['data'];
            $status = $res['status'];
            curl_close($ch); 
            if($status == 'ok'){
                $fileUploadGambar = $_FILES['imgkategori']['name'];
                if ($fileUploadGambar != NULL) {
                    $namaFileGambar = "$namakategori";
                    $fileGambar = $this->request->getFile('imgkategori');
                    $fileGambar->move('Gambar', $namaFileGambar . '.' . $fileGambar->getExtension());
                    $pathGambar = base_url().'Gambar/' . $fileGambar->getName();
                } else {
                    $pathGambar = 'gagal';
                }
            //save to database 
                $this->categories->insert([
                    'categories_name' => $namakategori,
                    'thumb' =>$pathGambar,
                    'gofile_folder_id' =>$gofileId['id'],
                    'created_at' => date('Y-m-d')
                ]);
                $msg = ['sukses' => 'Kategori berhasil disimpan',
                'data' =>$pathGambar];
            }else{
                $msg = ['gagal' => 'Kategori Gagal disimpan, Cek Gofile',
                'data' =>$pathGambar];
            }

            echo json_encode($msg);
        }
    }
    
    public function postEdit(){
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $namacategories = $this->request->getVar('namakategori');
            $img = $_FILES['imgkategori']['name'];
            $rowcategories = $this->categories->find($id);
            if($img!=null){
                $imgloc = substr($rowcategories['thumb'],strpos($rowcategories['thumb'],"Gambar/"));
                if(file_exists($imgloc)){
                    unlink($imgloc);
                }
                $filename = str_replace(' ', '-', $namacategories);
                $fileimg = $this->request->getFile('imgkategori');
                $fileimg->move('Gambar/',$filename.'.'.$fileimg->getExtension());
                $pathimg = base_url().'Gambar/'.$fileimg->getName();
            }else{
                $pathimg = $rowcategories['categories_img'];
            }
            $this->categories->update($id,[
                'categories_name' =>$namacategories,
                'thumb'=>$pathimg,
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
                'sukses' => 'Kategori Dihapus'
            ];
            echo json_encode($msg);
        }
    }
    public function postModal(){
        $tipe = $this->request->getVar('fungsi');
        if($tipe == 'tambah'){
            $data = [
                'aksi' => $this->request->getPost('aksi')
            ];
            $msg = [
                'data' => view('categories/modalformtambah', $data)
            ];

            echo json_encode($msg);
        }else if($tipe == 'edit'){
            $id = $this->request->getVar('id');
            $categories = $this->categories->find($id);
            $data = [
                'aksi' => $this->request->getPost('aksi'),
                'categories' => $categories
            ];
            $msg = [
                'data' => view('categories/modalformedit', $data)
            ];

            echo json_encode($msg);
        }
    }
}
