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
        $datahead['scriptfile'] = base_url('assets/js/boards.js');
        $data['headline'] = 'Boards';
        $data['theader'] = ['#', 'Board'];
        $data['tdata'] = $database->getBoards();
        echo view('templates/header', $datahead);
        echo view('templates/nav', $navData);
        echo view('templates/components/modalBoards');
        echo view('dev/boards/index', $data);
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
        $database = new Database();
        $insertData = $this->request->getPost();
        $id = $database->insertBoard($insertData);
        return redirect()->to(base_url('boards'));
    }

    public function postEdit()
    {
        $database = new Database();
        $updateData = $this->request->getPost();
        $database->updateBoard($updateData['id'], $updateData);
        return redirect()->to(base_url('boards'));
    }

    public function postDelete()
    {
        $database = new Database();
        $deleteData = $this->request->getPost();
        $database->deleteBoard($deleteData['id']);
        return redirect()->to(base_url('boards'));
    }
}
