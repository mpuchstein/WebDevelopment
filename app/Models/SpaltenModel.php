<?php
namespace App\Models;

    use CodeIgniter\Model;

class SpaltenModel extends Model {
    protected $table = 'spalten';
    protected $primaryKey = 'id';
    protected $allowedFields = ['boardsid', 'sortid', 'spalte', 'spaltenbeschreibung', 'geloescht'];

    // getAllSpalten returns all tasks ordered by task
    public function getAllSpalten(int $id = null): array //return Spalten
    {
        $query = $this->db->table($this->table)
            ->select("*")
            ->orderBy('spalte', 'ASC');
        if ($id !== null) {
            $query->where("id", $id);
            return $query->get()->getRowArray();
        }
        return $query->get()->getResultArray();

    }

    // getActiveSpalten returns all tasks that are not deleted
    public function getActiveSpalten(int $id = null): array{
        $query = $this->db->table($this->table)
            ->select("*")
            ->where('geloescht', 0)
            ->orderBy('spalte', 'ASC');
        if ($id !== null) {
            $query->where("id", $id);
            return $query->get()->getRowArray();
        }
        return $query->get()->getResultArray();
    }

    // insertSpalten adds a new spalten into the database, values are given by $data
    // return the $id
    public function insertSpalten(array $data): int
    {
        $this->db->table($this->table)->insert($data);
        return $this-> db -> insertID();
    }

    // updateSpalten updates an existing Spalten identified by $id with the new $data
    public function updateSpalten(int $id, array $data): bool
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    // deletes and removes a spalten identified by $id unrecoverably and permanently
    public function deleteSpalten(int $id): bool
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }

    // deletes a spalten identified by $id but does not remove it from the database
    public function setSpaltenDeleted(int $id): bool
    {
        return $this->db->table($this->table)->set(['geloescht' => 1])->where(['id' => $id])->update();
    }
}
