<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends BaseController
{
    public function getIndex()
    {
        $taskModel = new TasksModel();
        $data['headline'] = 'Tasks';
        $data['tasks'] = $taskModel->getTask();
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksCards', $data);
        echo view('template/footer');
    }

    public function getTable()
    {
        $taskModel = new TasksModel();
        $data['headline'] = 'TasksTable';
        $data['tasks'] = $taskModel->getAllTask();
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksTab', $data);
        echo view('template/footer');
    }

    public function getCards()
    {
        $taskModel = new TasksModel();
        $data['headline'] = 'TasksCards';
        $data['tasks'] = $taskModel->getTask();
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksCards', $data);
        echo view('template/footer');
    }

    public function getModal(){
        $taskModel = new TasksModel();
        $data['headline'] = 'TasksCardsModalCrud';
        $data['tasks'] = $taskModel->getTask();
        $datahead['scriptfile'] = base_url('assets/s/tasksModalCrud.js');
        echo view('template/header', $datahead);
        echo view('template/nav');
        echo view('dev/tasksmodalcrud', $data);
        echo view('template/footer');

    }

    //TODO catch $ID not in database
    public function getCrud($type = 'new', $id = null)
    {
        $data['mode'] = $type;
        $taskModel = new TasksModel();
        if ($type == 'new' && $id == null) {
            $data['headline'] = 'New Task';
        } elseif ($type == 'edit' && $id != null) {
            $data['headline'] = 'Edit Task';
            $data['tasks'] = $taskModel->getAllTask($id);
        } elseif ($type == 'delete' && $id != null) {
            $data['headline'] = 'Delete Task';
            $data['tasks'] = $taskModel->getAllTask($id);
        } elseif(($type == 'edit' || $type == 'delete') && $id == null){
            return redirect()->to('/tasks/table');  //cannot edit or del without $id
        } elseif($type == 'new' && $id != null){
            return redirect()->to('/tasks/crud/edit/'.$id);  //not allowed to add a new item with $id set
        }
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksCrud', $data);
        echo view('template/footer');
    }
    public function postNew(){
        $data = $this -> request -> getPost();
        $taskModel = new TasksModel();
        $id = $taskModel->insertTask($data);
        return redirect() -> to(base_url('tasks/success/new/').$id);
    }

    public function postEdit(){
        $data = $this -> request -> getPost();
        $taskModel = new TasksModel();
        $taskModel->updateTask($data['id'], $data);
        return redirect() -> to(base_url('tasks/success/edit/'.$data['id']));
    }

    public function postDelete(){
        $data = $this -> request -> getPost();
        $taskModel = new TasksModel();
        $taskModel->deleteTask($data['id']);
//        $taskModel->setTaskDeleted($data['id']);
        return redirect() -> to(base_url('tasks/success/delete/'.$data['id']));
    }

    public function getDmp(){
        $tasksModelInstance = new TasksModel();
        $data['tasks'] = $tasksModelInstance->getAllTask();
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksDmp', $data);
        echo view('template/footer');
    }

    public function getJson($id = null)
    {
        $taskModel = new TasksModel();
        $task = $taskModel->getAllTask($id);
        return $this->response->setJSON($task);
    }

    //TODO maybe rewrite getIndex with get Parameters?
    public function getSuccess($type, $id){
        $dataSuc['type'] = $type;
        $dataSuc['id'] = $id;
        $taskModel = new TasksModel();
        $data['headline'] = 'Tasks';
        $data['tasks'] = $taskModel->getTask();
        echo view('template/header');
        echo view('template/nav');
        echo view('pages/tasksSuccess', $dataSuc);
        echo view('pages/tasks', $data);
        echo view('template/footer');
    }
}
