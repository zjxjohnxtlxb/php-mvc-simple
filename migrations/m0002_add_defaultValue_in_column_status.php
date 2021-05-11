<?php
/*
 * @Date: 2021-05-01 16:39:58
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-01 21:47:11
 * @FilePath: /php-mvc-framework/migrations/m0002_add_defaultValue_in_column_status.php
 */

use app\core\Application;

class m0002_add_defaultValue_in_column_status
{
    public function up()
    {
        $db = Application::$APP->db;
        $db->exec("ALTER TABLE users ALTER COLUMN status SET DEFAULT 0;");
    }
    
    public function down()
    {
        $db = Application::$APP->db;
        $db->exec("ALTER TABLE users ALTER COLUMN status DROP DEFAULT");
    }
}
