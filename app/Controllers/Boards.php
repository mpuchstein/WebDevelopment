<?php

namespace App\Controllers;

use App\Models\BoardsModel;
use App\Models\Database;

class Boards extends BaseController
{
    public function getIndex()
    {
        $database = new Database();
        $navData = $this->getNavElements('boards');
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('templates/components/modalBoards');
        echo view('dev/boards/index');
        echo view('templates/footer');
    }

    public function postIndex()
    {
        $data = $this->request->getJSON(true);
        $validation = service('validation');
        if ($validation->run(['id'=>$data['boardId']], 'boardsId')) {
            session()->set('boardsid', $data['boardId']);
            return $this->response->setJSON(['success' => true, 'boardsId' => $data['boardId']]);
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
        }
    }

    public function getJson($id = null)
    {
        $database = new Database();
        $board = $database->getBoards($id);
        return $this->response->setJSON($board);
    }

    public function postNew()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
//        echo('<pre>');
//        var_dump($data);
//        echo('</pre>');
//        die();
        if ($validation->run($data, 'boardsInsertArray')) {
            $database = new Database();
            $id = $database->insertBoard($data);
            return $this->response->setJSON(['success' => true, 'id' => $id]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }

    public function postEdit()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if ($validation->run($data, 'boardsUpdateArray')) {
            $database = new Database();
            $database->updateBoard($data['id'], $data);
            return $this->response->setJSON(['success' => true, 'id' => $data['id']]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }

    public function postDelete()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if ($validation->run($data, 'boardsId')) {
            $database = new Database();
            $database->deleteBoard($data['id']);
            return $this->response->setJSON(['success' => true, 'id' => $data['id']]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }
}
