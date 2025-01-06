<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['personenid', 'spaltenid', 'taskartenid', 'sortid', 'task', 'notizen', 'erstelldatum',
        'erinnerungsdatum', 'erinnerung', 'deadline', 'erledigt', 'geloescht'];

    public function getTasks(): array //return Tasks
    {
        return $this->db->table($this->table)
            ->select("*")
            ->orderBy('task', 'ASC')
            ->get()->getResultArray();
    }

    /*public function insert($data) {
        $data['completed'] = 0;
        $data['deleted'] = 0;
        $this->db->insert('tasks', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id)->update('tasks', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id)->update('tasks', ['deleted' => 1]);
    } */
}