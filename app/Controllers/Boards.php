<?php

namespace App\Controllers;

use App\Models\BoardsModel;

class Boards extends BaseController
{
    public function getIndex()
    {
        $boardModel = new BoardsModel();
        $datahead['scriptfile'] = base_url('assets/js/boards.js');
        $data['headline'] = 'Boards';
        $data['theader'] = ['ID', 'Board'];
        $data['tdata'] = $boardModel->getData();
        echo view('templates/header', $datahead);
        echo view('templates/nav');
        echo view('templates/components/modalBoards');
        echo view('dev/boards/index', $data);
        echo view('templates/footer');
    }

    public function postIndex(){
        $data = $this->request->getJSON(true);

    }

    public function getJson($id = null)
    {
        $boardModel = new BoardsModel();
        $board = $boardModel->getData($id);
        return $this->response->setJSON($board);
    }

    public function postNew()
    {
        $boardModel = new BoardsModel();
        $insertData = $this->request->getPost();
        $id = $boardModel->insertData($insertData);
        return redirect()->to(base_url('boards'));
    }

    public function postEdit()
    {
        $boardModel = new BoardsModel();
        $updateData = $this->request->getPost();
        $boardModel->updateData($updateData['id'], $updateData);
        return redirect()->to(base_url('boards'));
    }

    public function postDelete()
    {
        $boardModel = new BoardsModel();
        $deleteData = $this->request->getPost();
        $boardModel->delete($deleteData['id']);
        return redirect()->to(base_url('boards'));
    }
}
