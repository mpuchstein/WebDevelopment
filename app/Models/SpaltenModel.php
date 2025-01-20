<?php
namespace App\Models;

    use CodeIgniter\Model;

class SpaltenModel extends Model {
    protected $table = 'spalten';
    protected $primaryKey = 'id';
    protected $allowedFields = ['boardsid', 'sortid', 'spalte', 'spaltenbeschreibung'];

    // getColumns returns all columns
    public function getColumns(int $id = null): array{
        $query = $this->db->table($this->table)
            ->select("*")
            ->orderBy('spalte', 'ASC');
        if ($id !== null) {
            $query->where("id", $id);
            return $query->get()->getRowArray();
        }
        return $query->get()->getResultArray();
    }

    // insertSpalten adds a new spalten into the database, values are given by $data
    // return the $id
    public function insertColumn(array $data): int
    {
        $insertData = array(
            'boardsid' => $data['boardsid'],
            'sortid' => $data['sortid'],
            'spalte' => $data['spalte'],
            'spaltenbeschreibung' => $data['spaltenbeschreibung']
        );
        $this->db->table($this->table)->insert($insertData);
        return $this-> db -> insertID();
    }

    // updateColumn updates an existing column identified by $id with the new $data
    public function updateColumn(int $id, array $data): bool
    {
        $insertData = array(
            'id' => $data['id'],
            'boardsid' => $data['boardsid'],
            'sortid' => $data['sortid'],
            'spalte' => $data['spalte'],
            'spaltenbeschreibung' => $data['spaltenbeschreibung']
        );
        return $this->db->table($this->table)->update($insertData, array('id' => $id));
    }

    // deletes and removes a column identified by $id unrecoverably and permanently
    public function deleteColumn(int $id): bool
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    // deletes a spalten identified by $id but does not remove it from the database
    public function setSpaltenDeleted(int $id): bool
    {
        return $this->db->table($this->table)->set(['geloescht' => 1])->where(['id' => $id])->update();
    }
}
