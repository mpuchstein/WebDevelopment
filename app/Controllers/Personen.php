<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController
{

    public function getindex()
    {
        $personenModelInstance = new PersonenModel();
        #$data['test'] = 'Ich teste gerade';
        $data['headline'] = 'Personen';
        $data['personen'] = $personenModelInstance -> getSecureData();
        echo view('template/head');
        echo view('template/nav');
        echo view('pages/Personen', $data);
        echo view('template/footer');

    }

    public function gettext()
    {
        var_dump('Test');
    }

    public function getDmp(){
        $personenModelInstance = new PersonenModel();
        $data['personen'] = $personenModelInstance -> getSecureData();
        echo view('pages/personenDmp', $data);
    }
}
