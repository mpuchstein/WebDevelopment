<?php

namespace App\Controllers;

use old\Spalten;
use App\Models\SpaltenModel;
class Columns extends BaseController
{
    // Validierungsregeln für die Bearbeitung von Spalten
    public $spaltenbearbeiten = [
        'spalte' => 'required',
        'spaltenbeschreibung' => 'required',
        'sortid' => 'integer',
    ];

    //Fehlermeldungen für die Validierung von Spalten
    public $spaltenbearbeiten_errors = [
        'spalte' => [
            'required' => 'Bitte tragen Sie einen Spaltebezeichnung ein.',
        ],
        'spaltenbeschreibung' => [
            'required' => 'Bitte tragen Sie eine Beschreibung ein.',
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
        $validData = $this->validateColumn($data);
        $id = $columnModel->insertColumn($validData);
        //$id = $columnModel->insertColumn($data);
        return redirect()->to(base_url('columns'));
    }

    public function postEdit(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        $columnModel->updateColumn($data['id'], $data);
        $validData = $this->validateColumn($data);
        return redirect()->to(base_url('columns'));
    }

    public function postDelete(){
        $data = $this -> request -> getPost();
        $columnModel = new SpaltenModel();
        $columnModel->deleteColumn($data['id']);
        return redirect()->to(base_url('columns'));
    }

    public function validateColumn($data)
    {
        // Validierung der Daten
        if (!$this->validateData($data, $this->spaltenbearbeiten)) {
            // Wenn die Validierung fehlschlägt, das Spaltenfomular mit Fehlermeldungen anzeigen
            return view('dev/columnCrud', [
                'errors' => $this->validator->getErrors(),
            ]);
        }
        // Validierte Daten abrufen
        return $this->validator->getValidated();
    }
}
