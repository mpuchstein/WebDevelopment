<?php

namespace App\Controllers;

use App\Models\Database;

class Columns extends BaseController
{
    public function getIndex()
    {
        $database = new Database();
        $navData = $this->getNavElements('columns');
        $data['columns'] = $database->getColumns(joinBoards: true);
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('dev/columns', $data);
        echo view('templates/footer');
    }

    public function getTest(){
        $database = new Database();
        $navData = $this->getNavElements('columns');
        $formData['boards'] = $database->getBoards();
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('templates/components/modalColumns', $formData);
        echo view('templates/components/udBtn');
        echo view('dev/columns/index');
        echo view('templates/footer');
    }

    public function getJson($id = null)
    {
        $database = new Database();
        $task = $database->getColumns(joinBoards: true);
        if ($id == null) {
            return $this->response->setJSON($task);
        } else {
            return $this->response->setJSON($task[0]);
        }
    }
    public function getCrud($type = 'new', $id = null)
    {
        $navData = $this->getNavElements('columns');
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
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('dev/columnCrud', $data);
        echo view('templates/footer');
    }

    public function postNew()
    {
        $data = $this->request->getPost();
        $database = new Database();
        $validation = service('validation');
        if (!$validation->run($data, 'columnArray')) {
            $navData = $this->getNavElements('columns');
            $errorData['headline'] = 'Spalte erstellen';
            $errorData['mode'] = 'new';
            $errorData['error'] = $validation->getErrors();
            $errorData['boards'] = $database->getBoards();
            $errorData['columns'] = $data;
            echo view('templates/header');
            echo view('templates/nav', $navData);
            echo view('dev/columnCrud', $errorData);
            echo view('templates/footer');
        } else {
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
            $navData = $this->getNavElements('columns');
            $errorData['headline'] = 'Spalte bearbeiten';
            $errorData['mode'] = 'edit';
            $errorData['error'] = $validation->getErrors();
            $errorData['boards'] = $database->getBoards();
            $errorData['columns'] = $data;
            echo view('templates/header');
            echo view('templates/nav', $navData);
            echo view('dev/columnCrud', $errorData);
            echo view('templates/footer');
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
            $navData = $this->getNavElements('columns');
            $data['columns'] = $database->getColumns(joinBoards: true);
            echo view('templates/header');
            echo view('templates/nav', $navData);
            echo view('dev/columns', $data);
            echo('<script>alert("' . $validation->getErrors()['id'] . '")</script>');
            echo view('templates/footer');
        } else {
            $database->deleteColumn($data['id']);
            return redirect()->to(base_url('columns'));
        }
    }
}
