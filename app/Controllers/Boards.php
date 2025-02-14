<?php

namespace App\Controllers;

use App\Models\Database;

class Boards extends BaseController
{
    public function getIndex()
    {
        $database = new Database();
        $navData = $this->getNavElements('boards');
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('dev/boards/index');
        echo view('templates/footer');
        echo view('templates/scriptimports');
        echo view('dev/boards/script');
        echo view('templates/siteend');
    }

    public function postIndex()
    {
        $data = $this->request->getJSON(true);
        $validation = service('validation');
        if ($validation->run(['id' => $data['boardId']], 'boardsId')) {
            session()->set('boardsid', $data['boardId']);
            return $this->response->setJSON(['success' => true, 'boardsId' => $data['boardId']]);
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
        }
    }

    public function postJson()
    {
        $reqData = $this->request->getJSON(true);
        $database = new Database();
        if ($reqData['mode'] === 'query') {
            $boardId = $reqData['boardId'] ?? null;
            $board = $database->getBoards($boardId);
            return $this->response->setJSON($board);
        } else {
            $validation = service('validation');
            $formData = $reqData['formData'];
            if ($reqData['mode'] == 'new') {
                if ($validation->run($formData, 'boardsInsertArray')) {
                    $database = new Database();
                    $id = $database->insertBoard($formData);
                    $rowData = $database->getBoards($id);
                    return $this->response->setJSON(['success' => true, 'mode' => 'new', 'id' => $id, 'rowData' => $rowData]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            } else if ($reqData['mode'] == 'edit') {
                if ($validation->run($formData, 'boardsUpdateArray')) {
                    $database = new Database();
                    $database->updateBoard($formData['id'], $formData);
                    $rowData = $database->getBoards($formData['id']);
                    return $this->response->setJSON(['success' => true, 'mode' => 'edit', 'id' => $formData['id'], 'rowData' => $rowData]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            } elseif ($reqData['mode'] == 'delete') {
                if ($validation->run($formData, 'boardsId')) {
                    $database = new Database();
                    $database->deleteBoard($formData['id']);
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
