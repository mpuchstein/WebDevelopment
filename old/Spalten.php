<?php

namespace old;
use App\Controllers\BaseController;
use App\Models\SpaltenModel;
use const App\Controllers\footer;
use const App\Controllers\head;
use const App\Controllers\nav;
use const App\Controllers\pages;
use const App\Controllers\spalten;
use const App\Controllers\template;

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