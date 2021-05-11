<?php
/*
 * @Date: 2021-04-30 21:35:49
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-01 21:47:56
 * @FilePath: /php-mvc-framework/migrations/m0001_initial.php
 */

use app\core\Application;

class m0001_initial
{
    public function up()
    {
        $db = Application::$APP->db;
        $SQL = "CREATE TABLE users (
                id SERIAL PRIMARY KEY,
                password VARCHAR(512) NOT NULL,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status SMALLINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );";
        $db->exec($SQL);
    }

    public function down()
    {
        $db = Application::$APP->db;
        $SQL = "DROP TABLE users;";
        $db->exec($SQL);
    }
}
