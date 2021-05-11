<?php
/*
 * @Date: 2021-04-27 18:37:51
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-11 12:33:55
 * @FilePath: /php-mvc-framework/controllers/SiteController.php
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'junxi'
        ];
        
        return $this->render('home', $params);
    }
    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling submitted data';
    }
}
