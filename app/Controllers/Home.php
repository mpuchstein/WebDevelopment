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
                    // for testing setFlashdata because it only sets the session for the next request
                    // TODO: once filtering is implemented set session correctly
                    session()->setFlashdata(['userid' => $user['id'], 'role' => $user['role'], 'logged_in' => true]);
                    return redirect()->to(base_url('tasks'));
                }
            }
            // if something above was wrong, don't tell the user what, because possible attacks could use that
            // information
            $errorData['errors'] = ['username' => 'Falscher Nutzername oder Passwort', 'password' => 'Falscher Nutzername oder Passwort'];
            $errorData['username'] = $data['username'];
            $errorData['password'] = $data['password'];

        }
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/login/index', $errorData);
        echo view('template/footer');
    }

}
