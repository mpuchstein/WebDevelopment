<?php

namespace App\Models;

use CodeIgniter\Model;

class Database extends Model{
    protected $tasksTable = 'tasks';
    protected $taskTypesTable = 'taskarten';
    protected $columnsTable = 'spalten';
    protected $boardsTable = 'boards';
    protected $userTable = 'personen';
    protected $primaryKeyTasks = 'id';
    protected $primaryKeyTaskTypes = 'id';
    protected $primaryKeyColumns = 'id';
    protected $primaryKeyBoards = 'id';
    protected $primaryKeyUser = 'id';
    protected $foreignKeyTasks = [
        'personen',
        'spalten',
        'taskarten'
    ];
    protected $foreignKeyColumns= [
        'boards'
    ];
    protected array $allowedFieldsTasks = [
        'personenid',
        'spaltenid',
        'taskartenid',
        'sortid',
        'task',
        'notizen',
        'erstelldatum',
        'erinnerungsdatum',
        'erinnerung',
        'deadline',
        'erledigt',
        'geloescht'
    ];
    protected array $allowedFieldsTaskTypes = [
        'taskart',
        'icon'
    ];
    protected array $allowedFieldsColumns = [
        'boardsid',
        'sortid',
        'spalte',
        'spaltenbeschreibung'
    ];
    protected array $allowedFieldsBoards = [
        'boards'
    ];

    protected array $allowedFieldsUser = [
        'vorname',
        'name',
        'email',
        'password'
    ];

    public function __construct()
    {
        $this->foreignKeyTasks['personen'] = 'personenid';
        $this->foreignKeyTasks['spalten'] = 'spaltenid';
        $this->foreignKeyTasks['taskarten'] = 'taskartenid';
        $this->foreignKeyColumns['boards'] = 'boardsid';
        parent::__construct();
    }
    public function getTask(int $taskId = null, int $columnId = null, int $userId = null,
                            bool $joinTasktype = false, bool $joinColumns = false, bool $joinUser = false): array{
        $builder = $this->db->table($this->tasksTable);
        $builder->select('*');
        $builder->orderBy('sortid', 'ASC');
        if($taskId != null) {
            $builder->where('id', $taskId);
        }
        if($columnId != null) {
                $builder->where($this->foreignKeyTasks[$this->columnsTable], $columnId);
        }
        if($userId != null) {
            $builder->where($this->foreignKeyTasks[$this->userTable], $userId);
        }
        //join tasks with tasktypes where taskartenid = taskarten.id
        if($joinTasktype) {
            $builder->join($this->taskTypesTable,
                $this->foreignKeyTasks[$this->taskTypesTable]
                . '='
                . $this->taskTypesTable . '.' . $this->primaryKeyTaskTypes,
                'left');
        }
        if($joinColumns) {
            $builder->join($this->columnsTable,
            $this->foreignKeyColumns[$this->columnsTable]
            . '='
            . $this->columnsTable . '.' . $this->primaryKeyColumns);
        }
        if($joinUser) {
            $builder->join($this->userTable,
            $this->foreignKeyColumns[$this->userTable]
            . '='
            . $this->userTable . '.' . $this->primaryKeyUser);

        }
        return $builder->get()->getResultArray();
    }
    public function insertTask(array $data): int{
        $validData = array_intersect_key($data, $this->allowedFieldsTaskTypes);
        $builder = $this->db->table($this->tasksTable);
        $builder->insert($validData);
        return $this->db->insertID();
    }
    public function updateTask(int $taskId, array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsTaskTypes);
        $builder = $this->db->table($this->tasksTable);
        $builder->where($this->primaryKeyTasks, $taskId);
        return $builder->update($validData);
    }
    public function deleteTask(int $taskId): bool{
        $builder = $this->db->table($this->tasksTable);
        $builder->where($this->primaryKeyTasks, $taskId);
        return $builder->delete();
    }

}
