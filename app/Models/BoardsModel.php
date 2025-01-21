<?php
namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model {
    protected $table = 'boards';
    protected $primaryKey = 'id';
    protected $allowedFields = ['boards'];

    // get returns all boards
    public function getData(int $id = null): array{
        $query = $this->db->table($this->table)
            ->select("*")
            ->orderBy('board', 'ASC');
        if ($id !== null) {
            $query->where("id", $id);
            return $query->get()->getRowArray();
        }
        return $query->get()->getResultArray();
    }

    // insertSpalten adds a new spalten into the database, values are given by $data
    // return the $id
    public function insertData(array $data): int
    {
        $insertData = array(
            'board' => $data['board']
        );
        $this->db->table($this->table)->insert($insertData);
        return $this-> db -> insertID();
    }

    // updateColumn updates an existing column identified by $id with the new $data
    public function updateData(int $id, array $data): bool
    {
        $updateData = array(
            'id' => $data['id'],
            'board' => $data['board']
        );
        return $this->db->table($this->table)->update($updateData, array('id' => $id));
    }

    // deletes and removes a column identified by $id unrecoverably and permanently
    public function deleteColumn(int $id): bool
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}
