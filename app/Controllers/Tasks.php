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
        echo view('pages/tasks/index', $indexData);
        echo view('templates/footer');
        echo view('templates/scriptimports');
        echo view('templates/addins/tasks');
        echo view('templates/siteend');
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
            $taskData = $database->getTask($id, joinTaskType: true, joinUser: true)[0];
            return $this->response->setJSON(['success' => true, 'mode' => 'new', 'id' => $id, 'taskData' => $taskData]);
        } else {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }
    }

    public function postEdit()
    {
        $reqData = $this->request->getPost();
        $reqData['erinnerung'] = isset($reqData['erinnerung']) ? '1' : '0';
        $reqData['erledigt'] = isset($reqData['erledigt']) ? '1' : '0';
        $reqData['geloescht'] = isset($reqData['geloescht']) ? '1' : '0';
        $validation = service('validation');
        if ($validation->run($reqData, 'tasksArray')) {
            $database = new Database();
            $success = $database->updateTask($reqData['id'], $reqData);
            $taskData = $database->getTask($reqData['id'], joinTaskType: true, joinUser: true)[0];
            return $this->response->setJSON(['success' => $success, 'mode' => 'edit', 'id' => $reqData['id'], 'taskData' => $taskData]);
        } else {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }
    }

    public function postDelete()
    {
        $reqData = $this->request->getPost();
        $validation = service('validation');
        if ($validation->run($reqData, 'taskDelete')) {
            $database = new Database();
            $database->deleteTask($reqData['id']);
            return $this->response->setJSON(['success' => true, 'mode' => 'delete', 'id' => $reqData['id']]);
        } else {
            $errors = $validation->getErrors();
            return $this->response->setJSON(['success' => false, 'errors' => $errors]);
        }
    }

    public function postJson()
    {
        $reqData = $this->request->getJSON(true);
        $database = new Database();
        //$validation = service('validation');
        if ($reqData['mode'] == 'query') {
            $resData = [];
            $taskId = isset($reqData['taskId']) ? intval($reqData['taskId']) : null;
            if (isset($reqData['boardId'])) {
                $columnData = $database->getColumns(boardsId: $reqData['boardId']);
                foreach ($columnData as $column) {
                    $resData[$column['id']] = [
                        'columnId' => $column['id'],
                        'columnName' => $column['spalte'],
                        'tasks' => $database->getTask(taskId: $taskId, columnId: $column['id'], joinTaskType: true, joinUser: true),
                    ];
                }
            } else {
                if ($taskId == null) {
                    $resData = $database->getTask(taskId: $taskId, joinTaskType: true, joinColumns: true, joinUser: true, sortColumn: true);
                } else {
                    $resData = $database->getTask(taskId: $taskId, joinTaskType: true, joinColumns: true, joinUser: true, sortColumn: true)[0];
                }
            }
            return $this->response->setJSON($resData);
        } else if ($reqData['mode'] == 'move') {
            $taskId = $reqData['taskId'];
            $columnId = $reqData['columnId'];
            $beforeId = $reqData['beforeId'];
            $resData = $database->moveTaskBefore($taskId, $columnId, $beforeId);
            return $this->response->setJSON(['success' => true, 'mode' => 'move', 'tasks' => $resData]);
        } else {
            $validation = service('validation');
            $formData = $reqData['formData'];
            $formData['erinnerung'] = isset($formData['erinnerung']) ? '1' : '0';
            $formData['erledigt'] = isset($formData['erledigt']) ? '1' : '0';
            $formData['geloescht'] = isset($formData['geloescht']) ? '1' : '0';
            if ($reqData['mode'] == 'new') {
                if ($validation->run($formData, 'tasksArray')) {
                    $id = $database->insertTask($formData);
                    $taskData = $database->getTask($id, joinTaskType: true, joinUser: true)[0];
                    return $this->response->setJSON(['success' => true, 'mode' => 'new', 'id' => $id, 'taskData' => $taskData]);
                } else {
                    $errors = $validation->getErrors();
                    return $this->response->setJSON(['success' => false, 'errors' => $errors]);
                }
            } elseif ($reqData['mode'] == 'edit') {
                if ($validation->run($formData, 'tasksArray')) {
                    $success = $database->updateTask($formData['id'], $formData);
                    $taskData = $database->getTask($formData['id'], joinTaskType: true, joinUser: true)[0];
                    return $this->response->setJSON(['success' => $success, 'mode' => 'edit', 'id' => $formData['id'], 'taskData' => $taskData]);
                } else {
                    $errors = $validation->getErrors();
                    return $this->response->setJSON(['success' => false, 'errors' => $errors]);
                }
            } elseif ($reqData['mode'] == 'delete') {
                if ($validation->run($formData, 'taskDelete')) {
                    $database->deleteTask($formData['id']);
                    return $this->response->setJSON(['success' => true, 'mode' => 'delete', 'id' => $formData['id']]);
                } else {
                    $errors = $validation->getErrors();
                    return $this->response->setJSON(['success' => false, 'errors' => $errors]);
                }
            }
        }
        return $this->response->setJSON(['success' => false, 'error' => 'Missing parameters']);
    }
}