<?php

namespace App\Service;

use Core\AccessController;

class Access extends AccessController
{

    public function permission()
    {

        if ($this->accessList === 'all') {
            return;
        }



        $this->denied();
    }
}