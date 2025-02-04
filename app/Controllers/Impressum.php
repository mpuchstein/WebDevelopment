<?php

namespace App\Controllers;

class Impressum extends BaseController
{
    public function getIndex()
    {
        $navData = $this->getNavElements('impressum');
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('pages/impressum');
        echo view('templates/footer');
    }
}
