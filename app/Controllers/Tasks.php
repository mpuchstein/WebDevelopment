<?php

namespace App\Controllers;

use App\Models\Database;

class Tasks extends BaseController
{
    public function getIndex()
    {
        $database = new Database();
        $data['headline'] = 'Tasks';
        $data['tasks'] = $database->getTask(joinTaskType: true, joinUser: true, sortColumn: true);
        $data['columns'] = $database->getColumns(joinBoards: true);

        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksCards', $data);
        echo view('template/footer');
    }

    public function getTable()
    {
        $database = new Database();
        $data['headline'] = 'TasksTable';
        $data['tasks'] = $database->getTask(joinTaskType: true, joinColumns: true, joinUser: true);
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksTab', $data);
        echo view('template/footer');
    }

    //TODO catch $ID not in database
    public function getCrud($type = 'new', $id = null)
    {
        $data['mode'] = $type;
        $database = new Database();
        $data['columns'] = $database->getColumns();
        $data['taskType'] = $database->getTaskTypes();
        $data['personen'] = $database->getUsersSecure();
        if ($type == 'new' && $id == null) {
            $data['headline'] = 'New Task';
        } elseif ($type == 'edit' && $id != null) {
            $data['headline'] = 'Edit Task';
            $data['tasks'] = $database->getTask($id)[0];
        } elseif ($type == 'delete' && $id != null) {
            $data['headline'] = 'Delete Task';
            $data['tasks'] = $database->getTask($id)[0];
        } elseif (($type == 'edit' || $type == 'delete') && $id == null) {
            return redirect()->to('/tasks/table');  //cannot edit or del without $id
        } elseif ($type == 'new' && $id != null) {
            return redirect()->to('/tasks/crud/edit/' . $id);  //not allowed to add a new item with $id set
        }
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksCrud', $data);
        echo view('template/footer');
    }

    public function postNew()
    {
        $database = new Database();
        $data = $this->request->getPost();
        $data['erinnerung'] = isset($data['erinnerung']) ? '1' : '0';
        $data['erledigt'] = isset($data['erledigt']) ? '1' : '0';
        $data['geloescht'] = isset($data['geloescht']) ? '1' : '0';
        $validation = service('validation');
        if (!$validation->run($data, 'tasksArray')) {
            $errorData['mode'] = 'new';
            $errorData['headline'] = 'Neuer Task';
            $errorData['columns'] = $database->getColumns();
            $errorData['taskType'] = $database->getTaskTypes();
            $errorData['personen'] = $database->getUsersSecure();
            $errorData['error'] = $validation->getErrors();
            $errorData['tasks'] = $data;
            echo view('template/header');
            echo view('template/nav');
            echo view('pages/tasksCrud', $errorData);
            echo view('template/footer');
        } else {
            $id = $database->insertTask($data);
            return redirect()->to(base_url('tasks/success/new/') . $id);
        }
    }

    public function postEdit()
    {
        $database = new Database();
        $data = $this->request->getPost();
        $data['erinnerung'] = isset($data['erinnerung']) ? '1' : '0';
        $data['erledigt'] = isset($data['erledigt']) ? '1' : '0';
        $data['geloescht'] = isset($data['geloescht']) ? '1' : '0';
        $validation = service('validation');
        if (!$validation->run($data, 'tasksArray')) {
            $errorData['mode'] = 'edit';
            $errorData['headline'] = 'Task bearbeiten';
            $errorData['columns'] = $database->getColumns();
            $errorData['taskType'] = $database->getTaskTypes();
            $errorData['personen'] = $database->getUsersSecure();
            $errorData['error'] = $validation->getErrors();
            $errorData['tasks'] = $data;
            echo view('templates/header');
            echo view('templates/nav');
            echo view('pages/tasksCrud', $errorData);
            echo view('templates/footer');
        } else {
            $database->updateTask($data['id'], $data);
            return redirect()->to(base_url('tasks/success/edit/' . $data['id']));
        }
    }

    public function postDelete()
    {
        $data = $this->request->getPost();
        $database = new Database();
        $validation = service('validation');
        if (!$validation->run($data, 'taskDelete')) {
            $database = new Database();
            $data['headline'] = 'Tasks';
            $data['tasks'] = $database->getTask(joinTaskType: true, joinUser: true, sortColumn: true);
            $data['columns'] = $database->getColumns(joinBoards: true);
            echo view('templates/header');
            echo view('templates/nav');
            echo view('pages/tasksCards', $data);
            echo(
                '<script>alert("' . $validation->getErrors()['id'] . '")</script>'
            );
            echo view('templates/footer');
        } else {
            $database->deleteTask($data['id']);
            return redirect()->to(base_url('tasks/success/delete/' . $data['id']));
        }
    }

    public function getJson($id = null)
    {
        $database = new Database();
        $task = $database->getTask($id, joinTaskType: true, joinColumns: true, joinUser: true, sortColumn: true);
        return $this->response->setJSON($task);
    }

    public function getSuccess($type, $id)
    {
        $dataSuc['type'] = $type;
        $dataSuc['id'] = $id;
        $database = new database();
        $data['headline'] = 'Tasks';
        $data['tasks'] = $database->getTask(joinTaskType: true, joinUser: true, sortColumn: true);
        $data['columns'] = $database->getColumns(joinBoards: true);
        echo view('templates/header');
        echo view('templates/nav');
        echo view('pages/tasksCards', $data);
        echo view('pages/tasksSuccess', $dataSuc);
        echo view('templates/footer');
    }
}