<?php

namespace App\Controllers;

use Core\BaseController;
use App\Models\Position;

class Home extends BaseController
{

    public function index()
    {
        return $this->view->display('index.html.twig', [
            'positions' => Position::findAll()
        ]);

    }


}