<?php
/*
 * @Date: 2021-05-01 11:22:55
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-12 13:00:15
 * @FilePath: /php-mvc-framework/core/model/DbModel.php
 */

namespace app\core\model;

use app\core\Application;

abstract class DbModel extends Model
{
    public function save()
    {
        $tableName = $this->tableName();
        $attributes =  $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = $this->prepare(
            "INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES (" . implode(',', $params) . ");"
        );

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function prepare($sql)
    {
        return Application::$APP->db->prepare($sql);
    }

    public function findOne($where)
    {
        $tableName = $this->tableName();
        $attributes = array_keys($where);
        $conditions = implode(" AND ", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $sql = "SELECT * FROM $tableName WHERE $conditions";
        $statement = $this->prepare($sql);
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}
