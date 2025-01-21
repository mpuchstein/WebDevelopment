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
        } elseif(($type == 'edit' || $type == 'delete') && $id == null) {
            return redirect()->to(base_url('/columns'));
        } elseif($type == 'new' && $id != null){
            return redirect()->to(base_url('/columns/crud/edit/'.$id));
        }
        //TODO redirects for wrong call
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columnCrud', $data);
        echo view('template/footer');
    }

    public function postNew(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        $id = $columnModel->insertColumn($data);
        return redirect()->to(base_url('columns'));
    }

    public function postEdit(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        $columnModel->updateColumn($data['id'], $data);
        return redirect()->to(base_url('columns'));
    }

    public function postDelete(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        $columnModel->deleteColumn($data['id']);
        return redirect()->to(base_url('columns'));
    }

    /*public function validateData()
    {
        if ($this->validation->run($_POST, 'spaltenbearbeiten'))
        {
            //Anlegen oder ändern
        } else {
            // Daten zurück ans Formular übergeben
            $data['columns'] = $_POST;

            //Fehlermeldung generieren
            $data['errors'] = $this->validation->getErrors();
            echo view('columns/edit_val', $data);
        }
    }*/
}
