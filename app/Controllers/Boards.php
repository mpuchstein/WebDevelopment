<?php

namespace App\Controllers;

use App\Models\BoardsModel;

class Boards extends BaseController
{
    public function getIndex()
    {
        $boardModel = new BoardsModel();
        $datahead['scriptfile'] = base_url('assets/s/boards.js');
        $data['headline'] = 'Boards';
        $data['theader'] = ['ID', 'Board'];
        $data['tdata'] = $boardModel->getData();
        echo view('template/header', $datahead);
        echo view('template/nav');
        echo view('dev/boards/index', $data);
        echo view('template/footer');
    }

    public function getJson($id = null){
        $boardModel = new BoardsModel();
        $board = $boardModel->getData($id);
        return $this->response->setJSON($board);
    }

    public function postNew(){
        $boardModel = new BoardsModel();
        $insertData = $this->request->getPost();
        $id = $boardModel->insertData($insertData);
        return redirect()->to(base_url('boards'));
    }

    public function postEdit(){
        $boardModel = new BoardsModel();
        $updateData = $this->request->getPost();
        $boardModel->updateData($updateData['id'], $updateData);
        return redirect()->to(base_url('boards'));
    }

    public function postDelete(){
        $boardModel = new BoardsModel();
        $deleteData = $this->request->getPost();
        $boardModel->delete($deleteData['id']);
        return redirect()->to(base_url('boards'));
    }
}
