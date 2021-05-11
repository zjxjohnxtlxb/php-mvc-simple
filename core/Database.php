<?php
/*
 * @Date: 2021-04-29 20:55:57
 * @LastEditors: Junxi ZHANG
 * @LastEditTime: 2021-05-01 22:03:41
 * @FilePath: /php-mvc-framework/core/Database.php
 */

namespace app\core;

use PDO;

class Database
{
    protected PDO $pdo;
    public array $newMigrations = array();

    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $username = $config['username'] ?? '';
        $password = $config['password'] ?? '';

        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$ROOT_DIR . "/migrations");
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            $this->log("Applying migration $migration.");
            $instance->up();
            $this->log("Applied migration $migration.");

            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log('All migrations are applied.');
        }
    }

    public function createMigrationsTable()
    {
        $this->exec(
            "CREATE TABLE IF NOT EXISTS migrations (
                id SERIAL PRIMARY KEY,
                migration VARCHAR(255),
                creat_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            );"
        );
    }

    public function getAppliedMigrations()
    {
        $statement = $this->prepare(
            "SELECT migration FROM migrations;"
        );
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $newMigrations)
    {
        $str = implode(',', array_map(fn ($m) => "('$m')", $newMigrations));
        $statement = $this->prepare(
            "INSERT INTO migrations (migration) VALUES $str;"
        );
        $statement->execute();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    public function exec($sql)
    {
        return $this->pdo->exec($sql);
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
    }
}
