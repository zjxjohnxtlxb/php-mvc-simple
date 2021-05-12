<?php
/*
 * @Date: 2021-05-03 17:29:03
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 13:04:50
 * @FilePath: /php-mvc-framework/models/Login.php
 */

namespace app\models;

use app\core\model\UserModel;
use app\core\Application;

class Login extends UserModel
{
    public ?string $email = null;
    public ?string $password = null;

    public function tableName(): string
    {
        return 'users';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function attributes(): array
    {
        return ['email', 'password'];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }

    public function connect()
    {
        $user = $this->findOne(['email' => $this->email]);
        if (!$user) {
            $this->addErrorForMessage('email', 'User does not exist with this email.');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addErrorForMessage('password', 'Password is incorrect.');
            return false;
        }
        
        return Application::$APP->login($user);
    }
    
    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
