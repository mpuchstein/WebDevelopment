<?php

namespace App\Controllers;

class Columns extends BaseController
{
    public function getIndex()
    {
        echo view('templates/head');
        echo view('templates/nav');
        echo view('columns');
        echo view('templates/footer');
    }
    public function getForm()
    {
        echo view('templates/head');
        echo view('templates/nav');
        echo view('columnform');
        echo view('templates/footer');
    }
}
