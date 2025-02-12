<?php

namespace App\Controllers;

use App\Models\Database;

class Tasks extends BaseController
{
    public function getIndex()
    {
        $database = new Database();
        $navData = $this->getNavElements('tasks');
        $indexData['columns'] = $database->getColumns(boardsId: session('boardsid'));
        $indexData['taskTypes'] = $database->getTaskTypes();
        $indexData['users'] = $database->getUsersSecure();
        $indexData['boards'] = $database->getBoards();
        $indexData['boardsId'] = session('boardsid');
        echo view('templates/header');
        echo view('templates/nav', $navData);
        echo view('dev/tasks/index', $indexData);
        echo view('templates/footer');
    }

    public function postNew()
    {
        $data = $this->request->getPost();
        $data['erinnerung'] = isset($data['erinnerung']) ? '1' : '0';
        $data['erledigt'] = isset($data['erledigt']) ? '1' : '0';
        $data['geloescht'] = isset($data['geloescht']) ? '1' : '0';
        $validation = service('validation');
        if ($validation->run($data, 'tasksArray')) {
            $database = new Database();
            $id = $database->insertTask($data);
            return $this->response->setJSON(['success' => true, 'id' => $id]);
        } else {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }
    }

    public function postEdit()
    {
        $data = $this->request->getPost();
        $data['erinnerung'] = isset($data['erinnerung']) ? '1' : '0';
        $data['erledigt'] = isset($data['erledigt']) ? '1' : '0';
        $data['geloescht'] = isset($data['geloescht']) ? '1' : '0';
        $validation = service('validation');
        if ($validation->run($data, 'tasksArray')) {
            $database = new Database();
            $success = $database->updateTask($data['id'], $data);
            return $this->response->setJSON(['success' => $success, 'id' => $data['id']]);
        } else {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }
    }

    public function postDelete()
    {
        $data = $this->request->getPost();
        $validation = service('validation');
        if ($validation->run($data, 'taskDelete')) {
            $database = new Database();
            $database->deleteTask($data['id']);
            return $this->response->setJSON(['success' => true, 'id' => $data['id']]);
        } else {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }
    }

    public function postJson()
    {
        $data = $this->request->getJSON(true);
        $database = new Database();
        //$validation = service('validation');
        //TODO: Add validation
        if (isset($data['boardId'])) {
            $resultdata = [];
            $columnData = $database->getColumns(boardsId: $data['boardId']);
            foreach ($columnData as $column) {
                $resultdata[$column['id']] = [
                    'columnName' => $column['spalte'],
                    'tasks' => $database->getTask(columnId: $column['id'], joinTaskType: true, joinUser: true),
                ];
            }
            return $this->response->setJSON($resultdata);
        }
    }

    public function getJson($id = null)
    {
        $database = new Database();
        $task = $database->getTask($id, joinTaskType: true, joinColumns: true, joinUser: true, sortColumn: true);
        if ($id == null) {
            return $this->response->setJSON($task);
        } else {
            return $this->response->setJSON($task[0]);
        }
    }
}