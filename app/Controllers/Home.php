<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('template/head');
        echo view('template/nav');
        echo view('tasks');
        echo view('template/footer');
    }
}
