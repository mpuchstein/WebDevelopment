<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('template/nav');
        echo view('body');
        echo view('template/footer');
    }
}
