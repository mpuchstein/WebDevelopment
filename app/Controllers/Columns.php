<?php

namespace App\Controllers;

class Columns extends BaseController
{
    public function index()
    {
        echo view('template/head');
        echo view('template/nav');
        echo view('columns');
        echo view('template/footer');
    }
}
