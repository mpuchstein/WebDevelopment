<?php

namespace App\Controllers;

use App\Models\Database;

class Users extends BaseController
{

    public function getIndex()
    {
        $database = new Database();
        $navData = $this->getNavElements('users');
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('dev/users/index');
        echo view('templates/footer');
        echo view('templates/scriptimports');
        echo view('dev/users/script');
        echo view('templates/siteend');
    }
    public function postJson()
    {
        $reqData = $this->request->getJSON(true);
        $database = new Database();
        if ($reqData['mode'] === 'query') {
            $userId= $reqData['userId'] ?? null;
            $user = $database->getUsers($userId);
            return $this->response->setJSON($user);
        } else {
            $validation = service('validation');
            $formData = $reqData['formData'];
            if ($reqData['mode'] == 'new') {
                if ($validation->run($formData, 'usersInsertArray')) {
                    $database = new Database();
                    $id = $database->insertUser($formData);
                    $rowData = $database->getUsers($id);
                    return $this->response->setJSON(['success' => true, 'mode' => 'new', 'id' => $id, 'rowData' => $rowData]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            } else if ($reqData['mode'] == 'edit') {
                if ($validation->run($formData, 'usersUpdateArray')) {
                    $database = new Database();
                    $database->updateUser($formData['id'], $formData);
                    $rowData = $database->getUsers($formData['id']);
                    return $this->response->setJSON(['success' => true, 'mode' => 'edit', 'id' => $formData['id'], 'rowData' => $rowData]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            } elseif ($reqData['mode'] == 'delete') {
                if ($validation->run($formData, 'usersDeleteArray')) {
                    $database = new Database();
                    $database->deleteUser($formData['id']);
                    return $this->response->setJSON(['success' => true, 'mode' => 'delete', 'id' => $formData['id']]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            }
        }
        return $this->response->setJSON(['success' => false, 'error' => 'Missing parameters']);
    }
}