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

}