<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Json extends BaseController
{
    public function getIndex()
    {
        return redirect()->to(base_url() . 'tasks/');
    }

    public function getTask($id = null)
    {
        $taskModel = new TasksModel();
        $task = $taskModel->getAllTask($id);
        return $this->response->setJSON($task);
    }
}
