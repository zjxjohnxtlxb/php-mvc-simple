<?php
/*
 * @Date: 2021-04-25 14:06:59
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 14:18:17
 * @FilePath: /php-mvc-framework/core/Application.php
 */

namespace app\core;

use app\core\db\Database;
use app\core\model\UserModel;

class Application
{
    public const EVENT_BEFORE_REQUEST = 'beforeRequest';
    public const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];

    public static string $ROOT_DIR;
    public static Application $APP;

    public ?string $layout = 'main';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Session $session;
    public Database $db;
    public View $view;
    public ?UserModel $user = null;

    public function __construct($rootDir, array $config)
    {
        self::$ROOT_DIR = $rootDir;
        self::$APP = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->db = new Database($config['db']);
        $this->userClass = $config['userClass'];

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $user_class = new $this->userClass();
            $primaryKey = $user_class->primaryKey();
            $this->user = $user_class->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView('_error', ['exception' => $e]);
        }
    }

    public function login(UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};

        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$APP->user;
    }

    public function on($eventName, $callback)
    {
        $this->eventListeners[$eventName][] = $callback;
    }

    public function triggerEvent($eventName)
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }
}
