<?php

namespace App;

use PDO;

class DB
{
    /**
     * @var PDO
     */
    protected $pdo;

    protected static $instance;

    /**
     * @throws \Exception
     */
    private function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
                DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (\PDOException $e) {
            throw new \Exception ($e->getMessage());
        }
    }

    /**
     * @return DB
     */
    public static function getInstance()
    {
        if (self::$instance === null)
            self::$instance = new self();

        return self::$instance;
    }

    /**
     * @return void
     */
    private function __clone() {
    }

    /**
     * @return void
     */
    private function __wakeup() {
    }

    /**
     * @throws \Exception
     */
    protected function run($sql)
    {
        try {
            $stmt = self::$instance->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function getRow($query)  {
        return $this->run($query)->fetch();
    }

    /**
     * @param $query
     * @return mixed
     * @throws \Exception
     */
    public function getRows($query)  {
        return $this->run($query)->fetchAll();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function import()
    {
        $this->run(file_get_contents('dump.sql'));
    }

    /**
     * @param $table
     * @return mixed
     * @throws \Exception
     */
    public function delete($table)  {
        return $this->run('DROP TABLE IF EXISTS ' . $table);
    }
}