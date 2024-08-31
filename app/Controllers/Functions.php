<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelCategories;
use App\Models\ModelFiles;
use App\Models\ModelItemCat;
use App\Models\ModelSistem;
use App\Models\ModelRequest;
use App\Models\ModelBug;
use App\Models\ModelCorusel;
use App\Models\ModelBackupFiles;
class Functions extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->categories = new ModelCategories();
        $this->items = new ModelItemCat();
        $this->files = new ModelFiles();
        $this->sistem = new ModelSistem();
        $this->laporan = new ModelBug();
        $this->req = new ModelRequest();
        $this->corusel = new ModelCorusel();
        $this->backupf = new ModelBackupFiles();
    }
    public function getAutocomplete(){
        $kategori = $this->request->getGet('kategori');
        $keyword = $this->request->getGet('term');
        if ($keyword != NULL || $keyword != '' ){

            $result = $this->files->orlike('files_name',$keyword)->where('categories_id',$kategori)->join('item_categories','files.item_id = item_categories.item_id')->find();
            if (count($result) > 10) {
                    $arr_result[] = [
                        'label'=>'Harap Carilebih detail',
                    ];
                foreach ($result as $row)
                    $arr_result[] = [
                        'label'=>$row['files_name'],
                        'value'=>$row['files_name']
                    ];
                echo json_encode($arr_result);
            }else if (count($result) < 10 && count($result) >0) {
                foreach ($result as $row)
                    $arr_result[] = [
                        'label'=>$row['files_name'],
                        'value'=>$row['files_name']
                    ];
                echo json_encode($arr_result);
            }else{
                $arr_result = [[
                    'label'=>'Files tidak ditemukan Atau Salah item',
                    'value'=>'false'
                ]];
            echo json_encode($arr_result);
            }
        }
    }
    function autocompletebarang(){
        $keyword = $this->request->getGet('term');
        if ($keyword != NULL || $keyword != '' ){
            $result = $this->barang->like('barang_nama',$keyword)->orlike('supplier_nama',$keyword)->join('supplier','barang.supplier_id = supplier.supplier_id')->paginate(10,'barang');
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = [
                        'label'=>$row['barang_nama'],
                        'value'=>$row['barang_nama']
                    ];
                echo json_encode($arr_result);
            }else{
                $arr_result = [[
                    'label'=>'barang tidak ditemukan',
                    'value'=>'0'
                ]];
            echo json_encode($arr_result);
            }
        }
    }
}
