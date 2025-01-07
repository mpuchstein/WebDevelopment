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
        echo view('tasks', $data);
        echo view('template/footer');
    }

    public function getTable()
    {
        $taskModel = new TasksModel();
        $data['headline'] = 'TasksTable';
        $data['tasks'] = $taskModel->getTasks();
        echo view('template/head');
        echo view('template/nav');
        echo view('pages/tasksTab', $data);
        echo view('template/footer');
    }

    public function getCards()
    {
        $taskModel = new TasksModel();
        $data['headline'] = 'TasksCards';
        $data['tasks'] = $taskModel->getTasks();
        echo view('template/head');
        echo view('template/nav');
        echo view('pages/tasksCards', $data);
        echo view('template/footer');
    }

    public function getCrud($type = 'new', $id = null)
    {
        $data['mode'] = $type;
        $taskModel = new TasksModel();
        if ($type == 'new' && $id == null) {
            $data['headline'] = 'New Task';
        } elseif ($type == 'edit' && $id != null) {
            $data['headline'] = 'Edit Task';
            $data['tasks'] = $taskModel->getTask($id);
        } elseif ($type == 'delete' && $id != null) {
            $data['headline'] = 'Delete Task';
            $data['tasks'] = $taskModel->getTask($id);
        }
        echo view('template/head');
        echo view('template/nav');
        echo view('pages/tasksCrud', $data);
        echo view('template/footer');
    }
   /*public function form($id = null) {
        $data['task'] = $id ? $this->Task_model->get($id) : null;
        $this->load->view('tasks/form', $data);
    }

    public function create() {
        $this->Task_model->insert($this->input->post());
        redirect('tasks');
    }

    public function update($id) {
        $this->Task_model->update($id, $this->input->post());
        redirect('tasks');
    }

    public function delete($id) {
        $this->Task_model->delete($id);
        redirect('tasks');
    }*/

    public function getDmp(){
        $tasksModelInstance = new TasksModel();
        $data['tasks'] = $tasksModelInstance->getTasks();
        echo view('pages/tasksDmp', $data);
    }
}
