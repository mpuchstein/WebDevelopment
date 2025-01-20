<?php

namespace App\Controllers;
use App\Models\SpaltenModel;

class Spalten extends BaseController{

  public function getindex(){
      #Controller-Funktion, die alle erforderlichen Daten für die View zusammenstellt und an diese übergibt
      $personenModelInstance = new SpaltenModel();
      #$data['test'] = 'Ich teste gerade';
      $data['headline'] = 'Spalten;
      $data['spalten'] = $personenModelInstance -> getSecureData();
      echo view('template / header');
      echo view('template/nav');
      echo view('pages/spalten', $data);
      echo view('template/footer);
  }
}