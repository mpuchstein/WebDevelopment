<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController
{
    public function getIndex()
    {
        var_dump("team17");
    }

    public function getDmp(){
        $tasksModelInstance = new TasksModel();
        $data['tasks'] = $tasksModelInstance->getTasks();
        echo view('pages/tasksDmp', $data);
    }
}
