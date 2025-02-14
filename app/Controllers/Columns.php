<?php

namespace App\Controllers;

use App\Models\Database;

class Columns extends BaseController
{
    public function getIndex()
    {
        $database = new Database();
        $navData = $this->getNavElements('columns');
        $indexData['boards'] = $database->getBoards();
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('pages/columns/index', $indexData);
        echo view('templates/footer');
        echo view('templates/scriptimports');
        echo view('pages/columns/script');
        echo view('templates/siteend');
    }

    public function postJson()
    {
        $reqData = $this->request->getJSON(true);
        $database = new Database();
        if ($reqData['mode'] === 'query') {
            $columnId = $reqData['columnId'] ?? null;
            $column = $database->getColumns($columnId, joinBoards: true);
            return $this->response->setJSON($column);
        } else {
            $validation = service('validation');
            $database = new Database();
            $formData = $reqData['formData'];
            if ($reqData['mode'] == 'new') {
                if ($validation->run($formData, 'columnArray')) {
                    $id = $database->insertColumn($formData);
                    $rowData = $database->getColumns($id, joinBoards: true);
                    return $this->response->setJSON(['success' => true, 'mode' => 'new', 'id' => $id, 'rowData' => $rowData]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            } else if ($reqData['mode'] == 'edit') {
                if ($validation->run($formData, 'columnArray')) {
                    $database->updateColumn($formData['id'], $formData);
                    $rowData = $database->getColumns($formData['id'], joinBoards: true);
                    return $this->response->setJSON(['success' => true, 'mode' => 'edit', 'id' => $formData['id'], 'rowData' => $rowData]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            } elseif ($reqData['mode'] == 'delete') {
                if ($validation->run($formData, 'columnDelete')) {
                    $database->deleteColumn($formData['id']);
                    return $this->response->setJSON(['success' => true, 'mode' => 'delete', 'id' => $formData['id']]);
                } else {
                    $errors = $validation->getErrors();
                    return response()->setJSON(['success' => false, 'errors' => $errors,]);
                }
            }
        }
        return $this->response->setJSON(['success' => false, 'error' => 'Missing parameters']);
    }
}
