<?php

namespace App\Controllers;

use Core\BaseController;
use App\Service\AuthService;

class Authorization extends BaseController
{

    public function login()
    {
        return $this->view->display('auth/login.html.twig');
    }

    public function signIn()
    {
        $authService = new AuthService($_POST);
        $err = $authService->set();

        if ($err !== true) {
            $this->setGlobalNotifications([
                'msg' => [
                    'errors' => $err
                ]]);
            header('Location: /login');
            exit();
        }
        header('Location: /');
    }

    public function logout()
    {
        (new AuthService([]))->unsetAuth();
        $this->redirectTo('/login');
    }

}