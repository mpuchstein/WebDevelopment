<?php

namespace App\Controllers;

use App\Models\Database;

class Users extends BaseController
{
    public function getIndex(){
        echo view('templates/header');
        echo view('templates/nav');
        echo view('templates/components/udBtn');
        echo view('templates/components/modalUsers');
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
    public function postEdit(){
        $data = $this->request->getPost();
        $database = new Database();
        $validation = service('validation');
        if($validation->run($data, 'usersUpdateArray')){
            $database = new Database();
            $success = $database->updateUser($data['id'], $data);
            return response()->setJSON(['success' => $success, 'id' => $data['id'],]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }

    public function postDelete(){
        $data = $this->request->getPost();
        $validation = service('validation');
        if($validation->run($data, 'usersDeleteArray')){
            $database = new Database();
            $success = $database->deleteUser($data['id']);
            return response()->setJSON(['success' => $success, 'id' => $data['id'],]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }
}