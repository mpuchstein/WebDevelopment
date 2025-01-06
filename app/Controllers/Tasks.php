<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController
{
    public function getIndex()
    {
        $taskModel = new TasksModel();
        $data['headline'] = 'Tasks';
        $data['tasks'] = $taskModel->getTasks();
        echo view('template/head');
        echo view('template/nav');
        echo view('pages/tasks', $data);
        echo view('template/footer');
    }

    public function getDmp(){
        $tasksModelInstance = new TasksModel();
        $data['tasks'] = $tasksModelInstance->getTasks();
        echo view('pages/tasksDmp', $data);
    }
}
