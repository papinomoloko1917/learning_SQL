<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    private $pdo;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/database.php';
        $this->servername = $config['servername'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbname = $config['dbname'];
        $this->charset = $config['charset'];
    }

    public function connect()
    {
        if ($this->pdo === null) {
            try {
                $dsn = "mysql:host={$this->servername};dbname={$this->dbname};charset={$this->charset}";
                $this->pdo = new PDO($dsn, $this->username, $this->password);

                // Устанавливаем режим обработки ошибок
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Возвращаем результаты как ассоциативные массивы
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function close()
    {
        $this->pdo = null;
    }
}
