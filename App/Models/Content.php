<?php

namespace App\Models;

use Core\Model;

class Content extends Model
{
    const TABLE = 'content';
    public $title, $body, $user_id, $user_id_btn;

}