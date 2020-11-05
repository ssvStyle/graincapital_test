<?php

namespace App\Models;

use App\Service\Authorization;
use Core\Storage\Bases\Mysql;

class Btns
{

    protected $position_id, $db;

    public function __construct()
    {
        $this->db = new Mysql();
        $this->position_id = (new Authorization($this->db))->getUserPosition();
    }



    public function getMy()
    {
        $btns = Position::findAll();

        switch ($this->position_id) {
            case 2;
                $btns[0] = [];
                break;
            case 3;
                $btns[0] = [];
                $btns[1] = [];
                break;

        }

        return $btns;


    }

}