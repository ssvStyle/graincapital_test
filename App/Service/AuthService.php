<?php

namespace App\Service;

use Core\Storage\Bases\Mysql;

class AuthService
{
    protected $formValidator, $authorization, $post;

    /**
     * AuthService constructor.
     * @param array $post
     */
    public function __construct(array $post)
    {
        $this->post = $post;
        $this->formValidator = new FormLoginValidator($post);
        $this->authorization = new Authorization(new Mysql());
    }


    /**
     * @return array|bool
     */
    public function set()
    {

        $this->formValidator->email();
        $this->formValidator->psw();
        $errors = $this->formValidator->getErrors();

        if (empty($errors)) {
            if (!$this->authorization->loginExist($this->post['email'])) {
                $errors[] = 'Пользователя с таким логином нет';
                return  $errors;
            }

            if ($this->authorization->loginAndPassValidation($this->post['email'], $this->post['psw'])) {
                return $this->authorization->setAuth($this->post['remember'] ?? false);
            } else {
                $errors[] = 'Неверный пароль';
                return  $errors;
            }
        }
        return  $errors;
    }

    public function unsetAuth() : bool
    {
        return $this->authorization->exitAuth();
    }

}