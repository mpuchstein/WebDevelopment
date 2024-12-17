<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex()
    {
        echo view('templates/head');
        echo view('templates/nav');
        echo view('tasks');
        echo view('templates/footer');
    }
}
