<?php

namespace App\Controllers;

class Impressum extends BaseController
{
    public function getIndex()
    {
        echo view('template/head');
        echo view('template/nav');
        echo view('impressum');
        echo view('template/footer');
    }
}
