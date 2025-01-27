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
        echo view('templates/header');
        echo view('templates/nav');
        echo view('pages/Personen', $data);
        echo view('templates/footer');
    }
}
