<?php


namespace App\Controllers;

class Logout extends BaseController
{
    public function getIndex()
    {
        session()->remove(['userid', 'pLevel', 'logged_in']);
        return redirect()->to(base_url());
    }
}
