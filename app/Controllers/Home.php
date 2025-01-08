<?php

namespace App\Controllers;

use App\Models\TasksModel;
class Home extends BaseController
{
    public function getIndex()
    {
        return redirect() -> to(base_url().'tasks/');
    }
}
