<?php

namespace App\Service;

use App\Models\User;

class CreateUserService
{
    protected $formValidator, $userModel, $post;

    public function __construct(array $post)
    {
        $this->post = $post;
        $this->formValidator = new FormLoginValidator($post);
        $this->userModel = new User();
    }

    public function add()
    {

        $this->formValidator->email();
        $this->formValidator->psw();
        $errors = $this->formValidator->getErrors();

        if (empty($errors)) {
            $this->userModel->email = $this->post['email'];
            $this->userModel->psw = password_hash($this->post['psw'], PASSWORD_DEFAULT);
            $this->userModel->created_at = time();
            $this->userModel->updated_at = 0;
            $this->userModel->position_id = (int)$this->post['position_id'];
            $this->userModel->session_token = '';
            $this->userModel->save();
        }
        return  $errors;

    }

}