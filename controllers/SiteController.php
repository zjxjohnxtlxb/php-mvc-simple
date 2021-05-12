<?php
/*
 * @Date: 2021-04-27 18:37:51
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 08:50:17
 * @FilePath: /php-mvc-framework/controllers/SiteController.php
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Contact;
use app\core\form\Form;

class SiteController extends Controller
{
    public function home(Request $request, Response $response)
    {
        $params = [
            'name' => 'junxi'
        ];

        return $this->render('home', $params);
    }
    public function contact(Request $request, Response $response)
    {
        $contact = new Contact();
        $form = new Form();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());

            if ($contact->validate() && $contact->send()) {
                Application::$APP->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            } else {
                return $this->render('contact', ['model' => $contact, 'form' => $form]);
            }
        }
        return $this->render('contact', ['model' => $contact, 'form' => $form]);
    }
}
