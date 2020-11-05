<?php

namespace App\Service;

class FormLoginValidator
{
    
    protected $post, $errors = [];
    
    public function __construct(array $post)
    {
        $this->post = $post;
    }

    /**
     * check email
     *
     * @return bool
     */
    public function email() : bool
    {

        $email = $this->post['email'] ?? '';

        if ($email === '') {
            $this->errors[] = 'Поле email не должно быть пустым!';
        }

        if (!(bool)preg_match('~^.{3,}\@.*\.{1}[a-zA-Z]{3,}$~' ,$email)){
            $this->errors[] = 'Не верный формат email!';
        }

        if (!empty($this->errors)) {
            return false;
        }

        return true;

        
    }

    /**
     * check psw
     *
     * @return bool
     */
    public function psw() : bool
    {

        $psw = $this->post['psw'] ?? '';

        if ($psw === '') {
            $this->errors[] = 'Поле пароль не должно быть пустым!';
        }

        if (mb_strlen($psw) < 6){
            $this->errors[] = 'Длина пароля не меньше 6 символов!';
        }

        if (!(bool)preg_match('~\!{1,}~', $psw)){
            $this->errors[] = 'Пароль длжен содержать символ "!"';
        }

        if (!empty($this->errors)) {
            return false;
        }

        return true;
        
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }



}