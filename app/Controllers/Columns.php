<?php

namespace App\Controllers;

class Columns extends BaseController
{
    public function getIndex()
    {
        echo view('template/head');
        echo view('template/nav');
        echo view('columns');
        echo view('template/footer');
    }
    public function getForm()
    {
        echo view('template/head');
        echo view('template/nav');
        echo view('columnform');
        echo view('template/footer');
    }
}
