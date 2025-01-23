<?php

namespace App\Controllers;

use old\Spalten;
use App\Models\Database;
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
        $database = new Database();
        $data['columns'] = $database->getColumns(joinBoards: true);
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columns', $data);
        echo view('template/footer');
    }

    public function getCrud($type = 'new', $id = null){
        $data['mode'] = $type;
        $database = new Database();
        $data['boards'] = $database->getBoards();
        if($type == 'new' && $id == null){
            $data['headline'] = 'New Column';
        } elseif($type == 'edit' && $id != null){
            $data['headline'] = 'Edit Column';
            $data['columns'] = $database->getColumns(columnId: $id)[0];
        } elseif($type == 'delete' && $id != null){
            $data['headline'] = 'Delete Column';
            $data['columns'] = $database->getColumns(columnId: $id)[0];
        } elseif(($type == 'edit' || $type == 'delete') && $id == null) {
            return redirect()->to(base_url('/columns'));
        } elseif($type == 'new' && $id != null){
            return redirect()->to(base_url('/columns/crud/edit/'.$id));
        }
//        echo('<pre>');
//        var_dump($data);
//        echo('</pre>');
//        die();
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columnCrud', $data);
        echo view('template/footer');
    }

    public function postNew(){
        $data = $this -> request -> getPost();
//        echo('<pre>');
//        var_dump($data);
//        echo('</pre>');
//        die();
        $database = new Database();
        $id = $database->insertColumn($data);
        return redirect()->to(base_url('columns'));
    }

    public function postEdit(){
        $data = $this -> request -> getPost();
//        echo('<pre>');
//        var_dump($data);
//        echo('</pre>');
//        die();
        $database = new Database();
        $database->updateColumn($data['id'], $data);
        return redirect()->to(base_url('columns'));
    }

    public function postDelete(){
        $data = $this -> request -> getPost();
//        echo('<pre>');
//        var_dump($data);
//        echo('</pre>');
//        die();
        $database = new Database();
        $database->deleteColumn($data['id']);
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
