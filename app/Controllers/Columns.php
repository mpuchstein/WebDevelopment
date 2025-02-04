<?php

namespace App\Controllers;

use App\Models\Database;

class Columns extends BaseController
{
    public function getIndex()
    {
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
        $task = $database->getColumns(columnId: $id, joinBoards: true);
        if ($id == null) {
            return $this->response->setJSON($task);
        } else {
            return $this->response->setJSON($task[0]);
        }
    }

    public function postNew()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if ($validation->run($data, 'columnArray')) {
            $database = new Database();
            $id = $database->insertColumn($data);
            return response()->setJSON(['success' => true, 'id' => $id,]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }

    public function postEdit()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if ($validation->run($data, 'columnArray')) {
            $database = new Database();
            $database->updateColumn($data['id'], $data);
            return response()->setJSON(['success' => true, 'id' => $data['id'],]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }

    public function postDelete()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if ($validation->run($data, 'columnDelete')) {
            $database = new Database();
            $database->deleteColumn($data['id']);
            return response()->setJSON(['success' => true, 'id' => $data['id'],]);
        } else {
            $errors = $validation->getErrors();
            return response()->setJSON(['success' => false, 'errors' => $errors,]);
        }
    }
}
