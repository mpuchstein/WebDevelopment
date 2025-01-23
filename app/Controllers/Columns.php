<?php

namespace App\Controllers;

use App\Models\Database;

class Columns extends BaseController
{
    public function getIndex()
    {
        $database = new Database();
        $data['columns'] = $database->getColumns(joinBoards: true);
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columns', $data);
        echo view('template/footer');
    }

    public function getCrud($type = 'new', $id = null)
    {
        $data['mode'] = $type;
        $database = new Database();
        $data['boards'] = $database->getBoards();
        if ($type == 'new' && $id == null) {
            $data['headline'] = 'Spalte erstellen';
        } elseif ($type == 'edit' && $id != null) {
            $data['headline'] = 'Spalte bearbeiten';
            $data['columns'] = $database->getColumns(columnId: $id)[0];
        } elseif ($type == 'delete' && $id != null) {
            $data['headline'] = 'Spalte löschen';
            $data['columns'] = $database->getColumns(columnId: $id)[0];
        } elseif (($type == 'edit' || $type == 'delete') && $id == null) {
            return redirect()->to(base_url('/columns'));
        } elseif ($type == 'new' && $id != null) {
            return redirect()->to(base_url('/columns/crud/edit/' . $id));
        }
        echo view('template/header');
        echo view('template/nav');
        echo view('dev/columnCrud', $data);
        echo view('template/footer');
    }

    public function postNew()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if (!$validation->run($data, 'columnArray')) {
            $database = new Database();
            $errorData['headline'] = 'Spalte erstellen';
            $errorData['mode'] = 'new';
            $errorData['error'] = $validation->getErrors();
            $errorData['boards'] = $database->getBoards();
            $errorData['columns'] = $data;
            echo view('template/header');
            echo view('template/nav');
            echo view('dev/columnCrud', $errorData);
            echo view('template/footer');
        } else {
            $database = new Database();
            $id = $database->insertColumn($data);
            return redirect()->to(base_url('columns'));
        }
    }

    public function postEdit()
    {
        $data = $this->request->getPost();
        $database = new Database();
        $validation = service('validation');
        if (!$validation->run($data, 'columnArray')) {
            $errorData['headline'] = 'Spalte bearbeiten';
            $errorData['mode'] = 'edit';
            $errorData['error'] = $validation->getErrors();
            $errorData['boards'] = $database->getBoards();
            $errorData['columns'] = $data;
            echo view('template/header');
            echo view('template/nav');
            echo view('dev/columnCrud', $errorData);
            echo view('template/footer');
        } else {
            $database->updateColumn($data['id'], $data);
            return redirect()->to(base_url('columns'));
        }
    }

    public function postDelete()
    {
        $data = $this->request->getPost();
        $database = new Database();
        $validation = service('validation');
        if (!$validation->run($data, 'columnDelete')) {
            $data['columns'] = $database->getColumns(joinBoards: true);
            echo view('template/header');
            echo view('template/nav');
            echo view('dev/columns', $data);
            echo('<script>alert("' . $validation->getErrors()['id'] . '")</script>');
            echo view('template/footer');
        } else {
            $database->deleteColumn($data['id']);
            return redirect()->to(base_url('columns'));
        }
    }
}
