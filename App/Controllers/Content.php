<?php

namespace App\Controllers;

use App\Service\ContentService;
use Core\BaseController;

class Content extends BaseController
{

    public function create()
    {
        exit((new ContentService($_POST))->save());
    }

}