<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex()
    {
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/login/index');
        echo view('template/footer');
    }
    public function postIndex(){
        $data = $this -> request -> getPost();
        $validation = service('validation');
        if(!$validation->run($data, 'loginInput')){
            $errordata['errors'] = $validation->getErrors();
            $errordata['username'] = $data['username'];
            $errordata['password'] = $data['password'];
            echo view('template/header');
            echo view('template/nav');
            echo view('dev/login/index', $errordata);
            echo view('template/footer');
        } else {
            $validation -> reset();
            password_verify($data['password']);
            // TODO: validate username and password
            return redirect()->to(base_url());
        }
    }
}
