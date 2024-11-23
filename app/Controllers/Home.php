<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('template/head');
        echo view('template/nav');
        echo view('home');
        echo view('template/footer');
    }

    public function impressum()
    {
        echo view('template/head');
        echo view('template/nav');
        echo view('impressum');
        echo view('template/footer');
    }
}
