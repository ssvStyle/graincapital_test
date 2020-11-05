<?php

namespace App\Controllers;

use App\Models\Btns;
use Core\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return $this->view->display('index.html.twig', [
            'positions' => (new Btns())->getMy()
        ]);
    }


}