<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['personenid', 'spaltenid', 'taskartenid', 'sortid', 'task', 'notizen', 'erstelldatum',
        'erinnerungsdatum', 'erinnerung', 'deadline', 'erledigt', 'geloescht'];

    // getTasks returns all tasks ordered by task
    public function getAllTask(int $id = null): array //return Tasks
    {
        $query = $this->db->table($this->table)
            ->select("*")
            ->orderBy('task', 'ASC');
        if ($id !== null) {
            $query->where("id", $id);
            return $query->get()->getRowArray();
        }
        return $query->get()->getResultArray();

    }

    // getActiveTasks returns all tasks that are not deleted
    public function getTask(int $id = null): array{
        $query = $this->db->table($this->table)
            ->select("*")
            ->where('geloescht', 0)
            ->orderBy('task', 'ASC');
        if ($id !== null) {
            $query->where("id", $id);
            return $query->get()->getRowArray();
        }
        return $query->get()->getResultArray();
    }

    // insertTask adds a new Task into the database, values are given by $data
    // return the $id
    public function insertTask(array $data): int
    {
        $this->db->table($this->table)->insert($data);
        return $this-> db -> insertID();
    }

    // updateTask updates an existing Task identified by $id with the new $data
    public function updateTask(int $id, array $data): bool
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    // deletes and removes a task identified by $id unrecoverably and permanently
    public function deleteTask(int $id): bool
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    // deletes a task identified by $id but does not remove it from the database
    public function setTaskDeleted(int $id): bool
    {
        return $this->db->table($this->table)->set(['geloescht' => 1])->where(['id' => $id])->update();
    }
}