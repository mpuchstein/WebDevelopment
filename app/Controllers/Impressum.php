<?php

namespace App\Controllers;

class Impressum extends BaseController
{
    public function getIndex()
    {
        echo view('templates/header');
        echo view('templates/nav');
        echo view('pages/impressum');
        echo view('templates/footer');
    }
}
