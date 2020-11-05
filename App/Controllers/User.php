<?php

namespace App\Controllers;

use App\Models\Position;
use Core\BaseController;
use App\Service\CreateUserService;

class User extends BaseController
{
    public function register()
    {
        return $this->view->display('auth/register.html.twig',[
            'positions' => Position::findAll()
        ]);
    }

    public function create()
    {
        $createUserService = new CreateUserService($_POST);
        $err = $createUserService->add();

        if ($err !== true) {
            $this->setGlobalNotifications([
                'msg' => [
                    'errors' => $err
                ]]);
            header('Location: /register');
            exit();
        }
        header('Location: /');
    }

}