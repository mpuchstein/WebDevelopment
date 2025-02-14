<?php

namespace App\Models;

use CodeIgniter\Model;

class Database extends Model
{
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
        'personen' => null,
        'spalten' => null,
        'taskarten' => null,
    ];
    protected $foreignKeyColumns = [
        'boards' => null,
    ];
    protected array $allowedFieldsTasks = [
        'personenid' => null,
        'spaltenid' => null,
        'taskartenid' => null,
        'sortid' => null,
        'task' => null,
        'notizen' => null,
        'erstelldatum' => null,
        'erinnerungsdatum' => null,
        'erinnerung' => null,
        'deadline' => null,
        'erledigt' => null,
        'geloescht' => null,
    ];
    protected array $allowedFieldsTaskTypes = [
        'taskart' => null,
        'icon' => null,
    ];
    protected array $allowedFieldsColumns = [
        'boardsid' => null,
        'sortid' => null,
        'spalte' => null,
        'spaltenbeschreibung' => null,
    ];
    protected array $allowedFieldsBoards = [
        'board' => null
    ];

    protected array $allowedFieldsUser = [
        'username' => null,
    ];

    protected array $allowedFieldsUserAdmin = [
        'username' => null,
        'plevel' => null,
        'defboard' => null,
        'vorname' => null,
        'name' => null,
        'email' => null,
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

    public function insertTask(array $data): int
    {
        $builder = $this->db->table($this->tasksTable);
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function deleteTask(int $taskId): bool
    {
        $builder = $this->db->table($this->tasksTable);
        $builder->where($this->primaryKeyTasks, $taskId);
        return $builder->delete();
    }

    public function getTaskTypes(int $taskTypeId = null): array
    {
        $builder = $this->db->table($this->taskTypesTable);
        $builder->select('*');
        $builder->orderBy($this->taskTypesTable . '.' . 'taskart', 'ASC');
        if ($taskTypeId != null) {
            $builder->where($this->primaryKeyTaskTypes, $taskTypeId);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();
    }

    public function insertTaskType(array $data): bool
    {
        $builder = $this->db->table($this->taskTypesTable);
        $builder->insert($data);
        return $this->db->insertID();
    }

//  CRUD functions for types of tasks

    public function updateTaskType(int $taskTypeId, array $data): bool
    {
        $builder = $this->db->table($this->taskTypesTable);
        $builder->where($this->primaryKeyTaskTypes, $taskTypeId);
        return $builder->update($data);
    }

    public function deleteTaskType(int $taskTypeId): bool
    {
        $builder = $this->db->table($this->taskTypesTable);
        $builder->where($this->primaryKeyTaskTypes, $taskTypeId);
        return $builder->delete();
    }

    public function insertColumn(array $data): bool
    {
        $builder = $this->db->table($this->columnsTable);
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateColumn(int $columnId, array $data): bool
    {
        $builder = $this->db->table($this->columnsTable);
        $builder->where($this->primaryKeyColumns, $columnId);
        return $builder->update($data);
    }

//  CRUD functions for columns

    public function deleteColumn(int $columnId): bool
    {
        $builder = $this->db->table($this->columnsTable);
        $builder->where($this->primaryKeyColumns, $columnId);
        return $builder->delete();
    }

    public function getBoards(int $boardId = null): array
    {
        $builder = $this->db->table($this->boardsTable);
        $builder->select('*');
        $builder->orderBy($this->boardsTable . '.' . $this->primaryKeyBoards, 'ASC');
        if ($boardId != null) {
            $builder->where($this->primaryKeyBoards, $boardId);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();

    }

    public function insertBoard(array $data): int
    {
        $builder = $this->db->table($this->boardsTable);
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateBoard(int $boardId, array $data): bool
    {
        $builder = $this->db->table($this->boardsTable);
        $builder->where($this->primaryKeyBoards, $boardId);
        return $builder->update($data);
    }

//  CRUD functions for boards

    public function deleteBoard(int $boardId): bool
    {
        $builder = $this->db->table($this->boardsTable);
        $builder->where($this->primaryKeyBoards, $boardId);
        return $builder->delete();
    }

    public function getUsersSecure(int $userId = null): array
    {
        $builder = $this->db->table($this->userTable);
        $builder->select($this->userTable . '.' . $this->primaryKeyUser);
        foreach ($this->allowedFieldsUser as $key => $value) {
            $builder->select($this->userTable . '.' . $key);
        }
        if ($userId != null) {
            $builder->where($this->primaryKeyUser, $userId);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();
    }

    public function getUsersAdmin(int $userId = null): array
    {
        $builder = $this->db->table($this->userTable);
        $builder->select($this->userTable . '.' . $this->primaryKeyUser);
        foreach ($this->allowedFieldsUserAdmin as $key => $value) {
            $builder->select($this->userTable . '.' . $key);
        }
        if ($userId != null) {
            $builder->where($this->primaryKeyUser, $userId);
            return $builder->get()->getRowArray();
        }
        return $builder->get()->getResultArray();
    }

    public function getUserByName(string $username): array
    {
        $builder = $this->db->table($this->userTable);
        $builder->select('id, plevel, defboard');
        $builder->where('username', $username);
        return $builder->get()->getRowArray();
    }

    public function userSetSecret(int $userId, string $secret): bool
    {
        $secretHash = password_hash($secret, PASSWORD_DEFAULT);
        $builder = $this->db->table($this->userTable);
        $builder->where($this->primaryKeyUser, $userId);
        $builder->set('passwort', $secretHash);
        return $builder->update();
    }

    public function userCheckSecret(int $userId, string $secret): bool
    {
        $builder = $this->db->table($this->userTable);
        $builder->select('passwort');
        $builder->where($this->primaryKeyUser, $userId);
        $secretHash = $builder->get()->getRowArray()['passwort'];
        return password_verify($secret, $secretHash);
    }

    public function insertUser(array $data): bool
    {
        $builder = $this->db->table($this->userTable);
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateUser(int $userId, array $data): bool
    {
        $builder = $this->db->table($this->userTable);
        $builder->where($this->primaryKeyUser, $userId);
        return $builder->update($data);
    }

    public function deleteUser(int $userId): bool
    {
        $builder = $this->db->table($this->userTable);
        $builder->where($this->primaryKeyUser, $userId);
        return $builder->delete();
    }

    public function getTaskOfBoard(int $boardId, int $taskId = null): array
    {
        $columnData = $this->getColumns(boardsId: $boardId);
        foreach ($columnData as $column) {
            $resData[$column['id']] = [
                'columnId' => $column['id'],
                'columnName' => $column['spalte'],
                'tasks' => $this->getTask(taskId: $taskId, columnId: $column['id'], joinTaskType: true, joinUser: true),
            ];
        }
        return $resData;
    }

    public function getColumns(int $columnId = null, int $boardsId = null, bool $joinBoards = false): array
    {
        $builder = $this->db->table($this->columnsTable);
        $builder->select($this->columnsTable . '.*');
        $builder->orderBy($this->columnsTable . '.' . 'sortid', 'ASC');
        if ($columnId != null) {
            $builder->where($this->columnsTable . '.' . $this->primaryKeyColumns, $columnId);
        }
        if ($boardsId != null) {
            $builder->where($this->columnsTable . '.' . $this->foreignKeyColumns[$this->boardsTable], $boardsId);
        }
        if ($joinBoards) {
            foreach ($this->allowedFieldsBoards as $key => $value) {
                $builder->select($key);
            }
            $builder->join($this->boardsTable,
                $this->columnsTable . '.' . $this->foreignKeyColumns[$this->boardsTable]
                . '='
                . $this->boardsTable . '.' . $this->primaryKeyBoards,
                'left'
            );
        }
        if(isset($columnId)){
            return $builder->get()->getRowArray();
        } else {
            return $builder->get()->getResultArray();
        }
    }

    public function getTask(int  $taskId = null, int $columnId = null, int $userId = null,
                            bool $joinTaskType = false, bool $joinColumns = false, bool $joinUser = false,
                            bool $sortColumn = false): array
    {
        $builder = $this->db->table($this->tasksTable);
        $builder->select($this->tasksTable . '.*');
        $builder->orderBy($this->tasksTable . '.' . 'sortid', 'ASC');
        if ($taskId != null) {
            $builder->where($this->tasksTable . '.' . $this->primaryKeyTasks, $taskId);
        }
        if ($columnId != null) {
            $builder->where($this->tasksTable . '.' . $this->foreignKeyTasks[$this->columnsTable], $columnId);
        }
        if ($userId != null) {
            $builder->where($this->tasksTable . '.' . $this->foreignKeyTasks[$this->userTable], $userId);
        }
        //join tasks with tasktypes where taskartenid = taskarten.id
        if ($joinTaskType) {
            foreach ($this->allowedFieldsTaskTypes as $key => $value) {
                $builder->select($this->taskTypesTable . '.' . $key);
            }
            $builder->join($this->taskTypesTable,
                $this->foreignKeyTasks[$this->taskTypesTable]
                . '='
                . $this->taskTypesTable . '.' . $this->primaryKeyTaskTypes,
                'left');
        }
        if ($joinColumns) {
            foreach ($this->allowedFieldsColumns as $key => $value) {
                $builder->select($this->columnsTable . '.' . $key);
            }
            $builder->join($this->columnsTable,
                $this->foreignKeyTasks[$this->columnsTable]
                . '='
                . $this->columnsTable . '.' . $this->primaryKeyColumns);
        }
        if ($joinUser) {
            foreach ($this->allowedFieldsUser as $key => $value) {
                $builder->select($this->userTable . '.' . $key);
            }
            $builder->join($this->userTable,
                $this->foreignKeyTasks[$this->userTable]
                . '='
                . $this->userTable . '.' . $this->primaryKeyUser);

        }
        if ($sortColumn) {
            $builder->orderBy($this->tasksTable . '.' . $this->foreignKeyTasks[$this->columnsTable]);
        }
        if ($taskId == null)
            return $builder->get()->getResultArray();
        else
            return $builder->get()->getRowArray();
    }

    public function moveTaskBefore($taskId, $columnId, $beforeId): array
    {
        $columnTasks = $this->getTask(columnId: $columnId);
        // move the task to the end of a column
        if ($beforeId === null) {
            // check if column is empty
            if (sizeof($columnTasks) > 0) {
                $tmpSortid = intval($columnTasks[0]['sortid'] / 2);
                if ($tmpSortid == 0) {
                    //no room at the end so we set the sortId of the moved task to 100
                    //and for all the others on multiples of 100 so we get enough room for a lot of moves
                    $tmpSortid = 100;
                    $builder = $this->db->table($this->tasksTable);
                    $updateArray[$taskId] = ['taskId' => $taskId, 'sortid' => $tmpSortid];
                    $builder->setData(['id' => $taskId, 'sortid' => $tmpSortid, 'spaltenid' => $columnId]);
                    foreach ($columnTasks as $task) {
                        //if task already in this column skip it
                        if ($task['id'] !== $taskId) {
                            $tmpSortid += 100;
                            $updateArray[$task['id']] = ['taskId' => $task['id'], 'sortid' => $tmpSortid];
                            $builder->setData(['id' => $task['id'], 'sortid' => $tmpSortid, 'spaltenid' => $columnId]);
                        }
                    }
                    $builder->onConstraint('id')->updateBatch();
                    return $updateArray;
                }
            } else {
                $tmpSortid = 100;
            }
        } else {
            for ($i = 0; $i < sizeof($columnTasks); $i++) {
                // search for before task, calculate the distance
                // btw it and the next task and place moved task half of it
                if ($columnTasks[$i]['id'] === $beforeId) {
                    $tmpSortid = $columnTasks[$i]['sortid'];
                    $i++;
                    if ($i < sizeof($columnTasks)) {
                        $diffSortid = $tmpSortid - $columnTasks[$i]['sortid'];
                        if ($diffSortid > 1) {
                            $tmpSortid += intval($diffSortid / 2);
                        } else {
                            // no room between the tasks so we set the sortId of the lowest task to 100
                            // and for all the others on multiples of 100 so we get enough room for a lot of moves
                            // while also searching for our place to insert
                            $tmpSortid = 100;
                            $builder = $this->db->table($this->tasksTable);
                            foreach ($columnTasks as $task) {
                                //if task already in this column skip it
                                if ($task['id'] !== $taskId) {
                                    if ($task['id'] !== $beforeId) {
                                        $updateArray[$task['id']] = ['taskId' => $task['id'], 'sortid' => $tmpSortid];
                                        $builder->setData(['id' => $task['id'], 'sortid' => $tmpSortid, 'spaltenid' => $columnId]);
                                        $tmpSortid += 100;
                                    } else {
                                        $updateArray[$beforeId] = ['taskId' => $task['id'], 'sortid' => $tmpSortid];
                                        $builder->setData(['id' => $beforeId, 'sortid' => $tmpSortid, 'spaltenid' => $columnId]);
                                        $tmpSortid += 100;
                                        $updateArray[$taskId] = ['taskId' => $taskId, 'sortid' => $tmpSortid];
                                        $builder->setData(['id' => $taskId, 'sortid' => $tmpSortid, 'spaltenid' => $columnId]);
                                        $tmpSortid += 100;
                                    }
                                }
                            }
                            $builder->onConstraint('id')->updateBatch();
                            return $updateArray;
                        }
                    } else {
                        $tmpSortid += 100;
                    }
                    break;
                }
            }
        }
        $this->updateTask($taskId, ['spaltenid' => $columnId, 'sortid' => $tmpSortid]);
        return [$taskId => ['taskId' => $taskId, 'sortid' => $tmpSortid]];
    }

    public function updateTask(int $taskId, array $data): bool
    {
        $builder = $this->db->table($this->tasksTable);
        $builder->where($this->primaryKeyTasks, $taskId);
        return $builder->update($data);
    }
}
