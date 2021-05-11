<?php
/*
 * @Date: 2021-04-30 21:41:57
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-04-30 21:43:41
 * @FilePath: /php-mvc-framework/migration.php
 */

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();
