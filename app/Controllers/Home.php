<?php

namespace App\Controllers;

use App\Models\Database;

class Home extends BaseController
{
    public function getIndex()
    {
        echo view('templates/header');
        echo view('templates/nav');
        echo view('dev/login/index');
        echo view('templates/footer');
    }
    public function postIndex()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        // check if $data contains the necessary information
        if (!$validation->run($data, 'loginInput')) {
            $errorData['errors'] = $validation->getErrors();
            $errorData['username'] = $data['username'];
            $errorData['password'] = $data['password'];
        } else {
            $database = new Database();
            // check if username is in the database, do not check above so possible attackers cannot guess for usernames
            // in database
            if ($validation->run($data, 'checkUsername')) {
                $user = $database->getUserByName($data['username']);
                $result = $database->userCheckSecret($user['id'], $data['password']);
                // check the password against the database, if correct log user in and forward to taskboard
                if ($result) {
                    session()->set(['userid' => $user['id'], 'pLevel' => $user['plevel'], 'logged_in' => true, 'boardsid' => $user['defboard']]);
                    return redirect()->to(base_url('tasks'));
                }
            }
            // if something above was wrong, don't tell the user what, because possible attacks could use that
            // information
            $errorData['errors'] = ['username' => 'Falscher Nutzername oder Passwort', 'password' => 'Falscher Nutzername oder Passwort'];
            $errorData['username'] = $data['username'];
            $errorData['password'] = $data['password'];

        }
        echo view('templates/header');
        echo view('templates/nav');
        echo view('dev/login/index', $errorData);
        echo view('templates/footer');
    }
}
