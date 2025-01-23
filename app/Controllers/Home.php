<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex()
    {
        return redirect()->to(base_url() . 'tasks/');
    }
}
