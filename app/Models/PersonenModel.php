<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonenModel extends Model
{
    protected $table      = 'personen';
    protected $primaryKey = 'id';
    protected $allowedFields = ['vorname', 'name', 'email', 'password'];
    public function getSecureData() : array //Paswort sichergehen
    {
        return $this->db->table($this->table)
            ->select('id, vorname, name, email') //welche Spalten
            ->get()
            ->getResultArray(); //Ausgabe bekommen
    }

}
