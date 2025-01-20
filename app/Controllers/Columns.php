<?php

namespace App\Controllers;

use old\Spalten;
use App\Models\SpaltenModel;
class Columns extends BaseController
{
    public function getIndex()
    {
        $columnModel = new SpaltenModel();
        $data['columns'] = $columnModel->getColumns();
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columns', $data);
        echo view('template/footer');
    }
    public function getForm()
    {
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/columnform');
        echo view('template/footer');
    }

    public function getCrud($type = 'new', $id = null){
        $data['mode'] = $type;
        $taskModel = new SpaltenModel();
        if($type == 'new' && $id == null){
            $data['headline'] = 'New Column';
        } elseif($type == 'edit' && $id != null){
            $data['headline'] = 'Edit Column';
            $data['columns'] = $taskModel->getColumns($id);
        } elseif($type == 'delete' && $id != null){
            $data['headline'] = 'Delete Column';
            $data['columns'] = $taskModel->getColumns($id);
        }
        //TODO redirects for wrong call
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columnCrud', $data);
        echo view('template/footer');
    }
}
