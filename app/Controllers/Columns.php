<?php

namespace App\Controllers;

use old\Spalten;
use App\Models\SpaltenModel;
class Columns extends BaseController
{
    public function getIndex()
    {
        $columnModel = new SpaltenModel();
        $data['columns'] = $columnModel->getColumns();
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columns', $data);
        echo view('template/footer');
    }
    public function getForm()
    {
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/columnform');
        echo view('template/footer');
    }
}
