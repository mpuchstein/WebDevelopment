<?php

namespace App\Controllers;

use App\Models\Database;

class Users extends BaseController
{
    public function getIndex(){
        $database = new Database();
        $data['users'] = $database->getUsersSecure();
        echo view('templates/header');
        echo view('templates/navbar');
        echo view('dev/users/index', $data);
        echo view('templates/footer');
    }

    public function getJson(int $userId=null){
        $database = new Database();
        $users = $database->getUsersSecure($userId);
        return $this->response->setJson($users);
    }

}