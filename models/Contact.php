<?php
/*
 * @Date: 2021-05-12 08:16:19
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 13:06:10
 * @FilePath: /php-mvc-framework/models/Contact.php
 */

namespace app\models;

use app\core\model\DbModel;

class Contact extends DbModel
{
    public ?string $subject = null;
    public ?string $email = null;
    public ?string $body = null;

    public function tableName(): string
    {
        return '';
    }

    public function attributes(): array
    {
        return [];
    }

    public function primaryKey(): string
    {
        return '';
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject.',
            'email' => 'Your email.',
            'body' => 'Body'
        ];
    }

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED]
        ];
    }

    public function send(){
        return true;
    }
}
