<?php
/*
 * @Date: 2021-04-28 09:47:12
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 17:56:48
 * @FilePath: /php-mvc-framework/controllers/AuthController.php
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\User;
use app\models\Login;
use app\core\form\Form;
use app\core\middlewares\AuthMiddelware;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddelware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $this->setLayout('auth');

        $login = new Login();
        $form = new Form();

        if ($request->isPost()) {
            $login->loadData($request->getBody());

            if ($login->validate() && $login->connect()) {
                return $response->redirect('/');
            } else {
                return $this->render('login', ['model' => $login, 'form' => $form]);
            }
        }
        return $this->render('login', ['model' => $login, 'form' => $form]);
    }

    public function register(Request $request, Response $response)
    {
        $this->setLayout('auth');

        $user = new User();
        $form = new Form();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$APP->session->setFlash('success', 'Thanks for registering.');
                return $response->redirect('/');
            } else {
                return $this->render('register', ['model' => $user, 'form' => $form]);
            }
        }
        return $this->render('register', ['model' => $user, 'form' => $form]);
    }

    public function logout(Request $request, Response $response)
    {   
        Application::$APP->logout();
        return $response->redirect('/');
    }

    public function profile(){

        return $this->render('profile');
    }
}
