<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelCorousel;

class Corusel extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->categories = new ModelCorousel();
    }
    public function getIndex()
    {
        $categories = $this->categories;
        $data = [
            'categories' => $categories->paginate(10, 'categories'),
            'pager' => $this->categories->pager
        ];
        return view('corusel/index',$data);
    }
    public function postTambah(){
        if ($this->request->isAJAX()) {
            $namaitem = $this->request->getVar('namaitem');
            
            $error = $_FILES['img'] ;

            $uploadOk = 1;
            // Looping all files
                $errorImg = "";
                $target_dir = "Gambar/Corusel/"; //path can be change
                $filename = $_FILES['img']['name'];
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                $check = getimagesize($_FILES["img"]["tmp_name"]);
                $imageFileTyp = pathinfo($target_file, PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileTyp);
                //check file type
                if ($check !== false) {
                    // echo "File is an image - " . $check["mime"] . ". ";
                    $uploadOk = 1;
                } else {
                    $errorImg =  "File is not an image";
                    $uploadOk = 0;
                }
                //check file exist
                if (file_exists($target_file)) {
                    $errorImg =  "Sorry, file " . $filename . " already exists";
                    $uploadOk = 0;
                }
                //reject file type
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" && $imageFileType != "zip" && $imageFileType != "webp"
                ) {
                    $errorImg =  "Sorry, file " . $filename . " IS NOT JPG, JPEG, PNG OR GIF FILE";
                    $uploadOk = 0;
                }

                // Upload file
                if ($uploadOk == 1) {
                    $img = $_FILES['img']['name'];
                    if($img!=null){
                        $fileimg = $this->request->getFile('img');
                        $fileimg->move('Gambar/Corusel',$fileimg->getName().'.'.$fileimg->getExtension());
                        $pathimg = base_url('Gambar/Corusel/'.$fileimg->getName());
                    }else{
                        $pathimg = '';
                    }
                        $url = "https://skintoolweb.oneaimdeveloper.com/Gambar/Corusel/" . $filename;
                        $this->categories->insert([
                            'img'=>$pathimg,
                            'tipe'=>$namaitem,
                            ]);
                        $msg = [
                            'sukses' => 'Kategori berhasil disimpan',
                            'img_stat' => $pathimg
                        ];
                }else{
                    $msg = [
                        'gagal' => 'Kategori Gagal disimpan, Gambar Bermasalah',
                        'cek' => $errorImg
                    ];
                }
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
                $fileimg->move('Gambar/Corusel',$filename.'.'.$fileimg->getExtension());
                $pathimg = base_url('Gambar/Corusel/'.$fileimg->getName());
            }else{
                $pathimg = base_url($rowitem['img']);
            }
            $this->categories->update($id,[
                'tipe' =>$namaitem,
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
                'data' => view('corusel/modalformtambah', $data)
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
                'data' => view('corusel/modalformedit', $data)
            ];

            echo json_encode($msg);
        }


    }
}
