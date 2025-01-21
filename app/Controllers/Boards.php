<?php

namespace App\Controllers;

use App\Models\BoardsModel;

class Boards extends BaseController
{
    public function getIndex()
    {
        $boardModel = new BoardsModel();
        $data['headline'] = 'Boards';
        $data['theader'] = ['ID', 'Board'];
        $data['tdata'] = $boardModel->getData();
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/boards/index', $data);
        echo view('template/footer');
    }
}
