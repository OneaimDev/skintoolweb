<?php

namespace App\Controllers;

use App\Models\ModelCategories;
use App\Models\ModelPack;
use App\Models\ModelItemCat;
use App\Models\ModelSistem;
use App\Models\ModelReport;
use App\Models\ModelCorousel;
use App\Models\ModelPengumuman;

class Layout extends BaseController
{
    public function __construct()
    {
        $this->categories = new ModelCategories();
        $this->files = new ModelPack();
        $this->sistem = new ModelSistem();
        $this->laporan = new ModelReport();
        $this->corusel = new ModelCorousel();
        $this->pengumuman = new ModelPengumuman();
    }
    public function getIndex(){
        $bug = $this->laporan;
        $isibug = $bug->where('is_done','false')->countAllResults();
        $data = [
            'jml_bug' => $isibug,

        ];
        return view('dashboard/index', $data);
    }
}
