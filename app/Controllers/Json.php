<?php

namespace App\Controllers;

use App\Models\Database;
use App\Models\TasksModel;

class Json extends BaseController
{
    public function getIndex()
    {
        return redirect()->to(base_url() . 'tasks/');
    }

    public function getTasks($id = null){
        $database = new Database();
        $result = $database->getTask(taskId: $id);
        return $this->response->setJSON($result);

    }

    public function getTasksColumn($id = null){
        $database = new Database();
        $result = $database->getTask(columnId: $id);
        return $this->response->setJSON($result);
    }

    public function getTasksUser($id = null){
        $database = new Database();
        $result = $database->getTask(userId: $id);
        return $this->response->setJSON($result);
    }
    public function getColumnBoard($id = null){
        $database = new Database();
        $result = $database->getColumns(columnId: $id, joinBoards: true);
        return $this->response->setJSON($result);
    }
}
