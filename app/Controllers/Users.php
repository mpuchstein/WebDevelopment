<?php

namespace App\Controllers;

use App\Models\Database;

class Users extends BaseController
{
    public function getIndex(){
        echo view('templates/header');
        echo view('templates/nav');
        echo view('dev/users/formUsers');
        echo view('dev/users/index');
        echo view('templates/footer');
    }

    public function getJson(int $userId=null){
        $database = new Database();
        $users = $database->getUsersSecure($userId);
        return $this->response->setJson($users);
    }

    public function postNew(){
        $data = $this->request->getPost();
        $validation = service('validation');
        if($validation->run($data, 'usersInsertArray')){
            $database = new Database();
            $id = $database->insertUser($data);
            return response()->setJSON(['success' => true, 'id' => $id,]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }

    }
    public function sanitizeData($data){
        foreach ($data as $key => $value) {
            $data[$key] = empty($data[$key]) ? null : $data[$key];
        }
    }

}