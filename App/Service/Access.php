<?php

namespace App\Service;

use Core\AccessController;
use Core\Storage\Bases\Mysql;

class Access extends AccessController
{

    public function permission()
    {

        if ($this->accessList === 'all' || (new Authorization(new Mysql()))->userVerify()) {
            return;
        }

        header('Location: /login');
        exit();

        //$this->denied();
    }
}