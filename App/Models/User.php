<?php

namespace App\Models;

class User extends \Core\Model
{
    const TABLE = 'users';
    public $psw, $email, $created_at, $updated_at, $position_id, $session_token;

}