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
        $this->db->table($this->table)->insert($data);
        return $this-> db -> insertID();
    }

    // updateColumn updates an existing column identified by $id with the new $data
    public function updateColumn(int $id, array $data): bool
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
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

    // Validierungsregeln
    public $spaltenbearbeiten = [
        'spalte' => 'required',
        'spaltenbeschreibung' => 'required',
        'sortid' => 'integer',
    ];

    // Fehlermeldungen
    public $spaltenbearbeiten_errors = [
        'spalte' => [
            'required' => 'Bitte tragen Sie einen Spaltebezeichnung ein.'
        ],
        'spaltenbeschreibung' => [
            'required' => 'Bitte tragen Sie einen Beschreibungein.'
        ],
        'sortid' => [
            'integer' => 'Die Sortid muss eine Zahl sein.',
        ],
    ];
}
