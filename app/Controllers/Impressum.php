<?php

namespace App\Controllers;

class Impressum extends BaseController
{
    public function getIndex()
    {
        echo view('templates/head');
        echo view('templates/nav');
        echo view('impressum');
        echo view('templates/footer');
    }
}
