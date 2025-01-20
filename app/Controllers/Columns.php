<?php

namespace App\Controllers;

use old\Spalten;
use App\Models\SpaltenModel;
class Columns extends BaseController
{
    // Validierungsregeln
    public $spaltenbearbeiten = [
        'spalte' => 'required',
        'spaltenbeschreibung' => 'required',
        'sortid' => 'integer',
    ];

    // Fehlermeldungen
    public $spaltenbearbeiten_errors = [
        'spalte' => [
            'required' => 'Bitte tragen Sie einen Spaltebezeichnung ein.'
        ],
        'spaltenbeschreibung' => [
            'required' => 'Bitte tragen Sie einen Beschreibungein.'
        ],
        'sortid' => [
            'integer' => 'Die Sortid muss eine Zahl sein.',
        ],
    ];
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

    public function postNew(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        if (! $this->validateData($data, $this->$spaltenbearbeiten)) {
            // The validation failed.
            return view('login', [
                'errors' => $this->validator->getErrors(),
            ]);
        }
        $validData = $this->validator->getValidated();
        $id = $columnModel->insertColumn($data);
        return redirect()->to(base_url('columns'));
    }

    public function postEdit(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        $columnModel->updateColumn($data['id'], $data);
    }

    public function postDelete(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        $columnModel->deleteColumn($data['id']);
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
