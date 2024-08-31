<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\ModelReport;

class Bug extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->bug = new ModelReport();
    }
    public function getIndex()
    {
        $bug = $this->bug->orderBy('report_time', 'DESC');
        $data = [
            'categories' => $bug->paginate(10, 'bug'),
            'pager' => $this->bug->pager
        ];
        return view('bug/index',$data);
    }
    
    public function postDetail(){
        $idfile = $this->request->getVar('kode');
        $files = $this->bug;
        $returndata = [
            'data' =>$files->where('id',$idfile)->findAll(),
        ];
        $data = [
            'data' => view('bug/modaldetail',$returndata)
        ];
        echo json_encode($data);
    }
    
    public function postFix(){
        $id = $this->request->getVar('id');
        $query = $this->bug->update($id,[
            'is_done' => 'true'
            ]);
        $data = [
            'sukses' => 'mantap!'
        ];
        echo json_encode($data);
    }
    
    
    
}
