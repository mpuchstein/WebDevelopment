<?php

namespace App\Controllers;

use App\Models\Database;

class Personen extends BaseController
{

    public function getindex()
    {
        $database = new Database();
        #$data['test'] = 'Ich teste gerade';
        $data['headline'] = 'Personen';
        $data['personen'] = $database->getUsersSecure();
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/Personen', $data);
        echo view('template/footer');

    }
}
