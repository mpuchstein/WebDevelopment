<?php

namespace App\Controllers;

use App\Models\Database;

class Home extends BaseController
{
    public function getIndex()
    {
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/login/index');
        echo view('template/footer');
    }
    public function getReset()
    {
        $database = new Database();
        $database->userSetSecret(1, 'Pa$$word0');
        $database->userSetSecret(2, 'Pa$$word1');
        return redirect()->to(base_url('tasks'));
    }
    public function postIndex()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if (!$validation->run($data, 'loginInput')) {
            $errorData['errors'] = $validation->getErrors();
            $errorData['username'] = $data['username'];
            $errorData['password'] = $data['password'];
        } else {
            $database = new Database();
            $user = $database->getUserByName($data['username']);
            $result = $database->userCheckSecret($user['id'], $data['password']);
            if ($result) {
                session()->setFlashdata(['userid' => $user['id'], 'role' => $user['role'], 'logged_in' => true]);
                return redirect()->to(base_url('tasks'));
            } else {
                $errorData['errors'] = ['username' => 'Wrong username or password', 'password' => 'Wrong username or password'];
                $errorData['username'] = $data['username'];
                $errorData['password'] = $data['password'];
            }
        }
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/login/index', $errorData);
        echo view('template/footer');
    }

}
