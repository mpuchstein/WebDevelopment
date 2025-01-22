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
    ];

    public function __construct()
    {
        $this->foreignKeyTasks['personen'] = 'personenid';
        $this->foreignKeyTasks['spalten'] = 'spaltenid';
        $this->foreignKeyTasks['taskarten'] = 'taskartenid';
        $this->foreignKeyColumns['boards'] = 'boardsid';
        parent::__construct();
    }
    //CRUD functions for tasks
    public function getTask(int $taskId = null, int $columnId = null, int $userId = null,
                            bool $joinTaskType = false, bool $joinColumns = false, bool $joinUser = false): array{
        $builder = $this->db->table($this->tasksTable);
        $builder->select('*');
        $builder->orderBy('sortid', 'ASC');
        if($taskId != null) {
            $builder->where($this->primaryKeyTasks, $taskId);
        }
        if($columnId != null) {
                $builder->where($this->foreignKeyTasks[$this->columnsTable], $columnId);
        }
        if($userId != null) {
            $builder->where($this->foreignKeyTasks[$this->userTable], $userId);
        }
        //join tasks with tasktypes where taskartenid = taskarten.id
        if($joinTaskType) {
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
//  CRUD functions for types of tasks
    public function getTaskTypes(int $taskTypeId = null): array{
        $builder = $this->db->table($this->taskTypesTable);
        $builder->select('*');
        $builder->orderBy('taskart', 'ASC');
        if($taskTypeId != null) {
            $builder->where($this->primaryKeyTaskTypes, $taskTypeId);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();
    }
    public function insertTaskType(array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsTaskTypes);
        $builder = $this->db->table($this->taskTypesTable);
        $builder->insert($validData);
        return $this->db->insertID();
    }
    public function updateTaskType(int $taskTypeId, array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsTaskTypes);
        $builder = $this->db->table($this->taskTypesTable);
        $builder->where($this->primaryKeyTaskTypes, $taskTypeId);
        return $builder->update($validData);
    }
    public function deleteTaskType(int $taskTypeId): bool{
        $builder = $this->db->table($this->taskTypesTable);
        $builder->where($this->primaryKeyTaskTypes, $taskTypeId);
        return $builder->delete();
    }
//  CRUD functions for columns
    public function getColumns(int $columnId = null, int $boardsId = null, bool $joinBoards = false): array{
        $builder = $this->db->table($this->columnsTable);
        $builder->select('*');
        $builder->orderBy('sortid', 'ASC');
        if($columnId != null) {
            $builder->where($this->primaryKeyColumns, $columnId);
        }
        if($boardsId != null) {
            $builder->where($this->foreignKeyColumns[$this->boardsTable], $boardsId);
        }
        if($joinBoards) {
            $builder->join($this->columnsTable,
                $this->foreignKeyColumns[$this->boardsTable]
                . '='
                . $this->boardsTable. '.' . $this->primaryKeyBoards
            );
        }
        return $builder->get()->getResultArray();
    }
    public function insertColumn(array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsColumns);
        $builder = $this->db->table($this->columnsTable);
        $builder->insert($validData);
        return $this->db->insertID();
    }
    public function updateColumn(int $columnId, array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsColumns);
        $builder = $this->db->table($this->columnsTable);
        $builder->where($this->primaryKeyColumns, $columnId);
        return $builder->update($validData);
    }
    public function deleteColumn(int $columnId): bool{
        $builder = $this->db->table($this->columnsTable);
        $builder->where($this->primaryKeyColumns, $columnId);
        return $builder->delete();
    }
//  CRUD functions for boards
    public function getBoards(int $boardId = null): array{
        $builder = $this->db->table($this->boardsTable);
        $builder->select('*');
        $builder->orderBy('board', 'ASC');
        if($boardId != null) {
            $builder->where($this->primaryKeyBoards, $boardId);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();

    }
    public function insertBoard(array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsBoards);
        $builder = $this->db->table($this->boardsTable);
        $builder->insert($validData);
        return $this->db->insertID();
    }
    public function updateBoard(int $boardId, array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsBoards);
        $builder = $this->db->table($this->boardsTable);
        $builder->where($this->primaryKeyBoards, $boardId);
        return $builder->update($validData);
    }
    public function deleteBoard(int $boardId): bool{
        $builder = $this->db->table($this->boardsTable);
        $builder->where($this->primaryKeyBoards, $boardId);
        return $builder->delete();
    }
    public function getUsersSecure(int $userId = null): array{
        $builder = $this->db->table($this->userTable);
        $builder->select('id, vorname, name, email');
        if($userId != null) {
            $builder->where($this->primaryKeyUser, $userId);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();
    }
    public function userSetSecret(int $userId, string $secret): bool{
        $secretHash = password_hash($secret, PASSWORD_DEFAULT);
        $builder = $this->db->table($this->userTable);
        $builder->where($this->primaryKeyUser, $userId);
        $builder->set('passwort', $secretHash);
        return $builder->update();
    }
    public function userCheckSecret(int $userId, string $secret): bool{
        $builder = $this->db->table($this->userTable);
        $builder->select('passwort');
        $builder->where($this->primaryKeyUser, $userId);
        $secretHash = $builder->get()->getRowArray()['passwort'];
        return password_verify($secret, $secretHash);
    }
    public function insertUser(array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsUser);
        $builder = $this->db->table($this->userTable);
        $builder->insert($validData);
        return $this->db->insertID();
    }
    public function updateUser(int $userId, array $data): bool{
        $validData = array_intersect_key($data, $this->allowedFieldsUser);
        $builder = $this->db->table($this->userTable);
        $builder->where($this->primaryKeyUser, $userId);
        return $builder->update($validData);
    }
    public function deleteUser(int $userId): bool{
        $builder = $this->db->table($this->userTable);
        $builder->where($this->primaryKeyUser, $userId);
        return $builder->delete();
    }
}
