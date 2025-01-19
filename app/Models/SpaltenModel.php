<?php
namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model {


  /*  public function getSpalten($id) {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->select('*');

        IF ($id != NULL)
            $this->spalten->where('spalten.id', $id);

        $result = $this->spalten->get();

        if ($id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    } */

}
