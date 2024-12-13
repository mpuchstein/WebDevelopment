<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController
{

    public function getindex()
    {
        $personenModelInstance = new PersonenModel();
        $data['test'] = 'Ich teste gerade';
        echo var_dump($personenModelInstance ->getSurceData());
        echo view('PersonenView', $data);

    }

    public function gettext()
    {
        var_dump('Test');
    }
}
