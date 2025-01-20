<?php

namespace App\Controllers;

class Impressum extends BaseController
{
    public function getIndex()
    {
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/impressum');
        echo view('template/footer');
    }
}
