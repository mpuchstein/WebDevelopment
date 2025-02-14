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
        echo view('pages/tasks/main', $indexData);
        echo view('templates/footer');
        echo view('templates/scriptimports');
        echo view('pages/tasks/script');
        echo view('templates/siteend');
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
                $resData = $database -> getTaskOfBoard($reqData['boardId'], $taskId);
            } else {
                $resData = $database->getTask(taskId: $taskId, joinTaskType: true, joinColumns: true, joinUser: true, sortColumn: true);
            }
            if(sizeof($resData) > 0) {
                return $this->response->setJSON(['success' => true, 'data' => $resData]);
            } else {
                return $this->response->setJSON(['success' => false, 'data' => null]);
            }
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
                    $taskData = $database->getTask($id, joinTaskType: true, joinUser: true);
                    return $this->response->setJSON(['success' => true, 'mode' => 'new', 'id' => $id, 'taskData' => $taskData]);
                } else {
                    $errors = $validation->getErrors();
                    return $this->response->setJSON(['success' => false, 'errors' => $errors]);
                }
            } elseif ($reqData['mode'] == 'edit') {
                if ($validation->run($formData, 'tasksArray')) {
                    $success = $database->updateTask($formData['id'], $formData);
                    $taskData = $database->getTask($formData['id'], joinTaskType: true, joinUser: true);
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