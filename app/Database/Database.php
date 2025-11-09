<?php

namespace App\Database;

class Database
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    private $connect;


    public function __construct()
    {
        $config = require_once __DIR__ . '/../config/database.php';
        $this->servername = $config['servername'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbname = $config['dbname'];
        $this->charset = $config['charset'];
    }

    public function connect()
    {
        $this->connect = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->connect->connect_error) {
            die("Connection failed: " . $this->connect->connect_error);
        }

        $this->connect->set_charset($this->charset);
        return $this->connect;
    }

    public function execute($query)
    {
        if ($this->connect->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $this->connect->error;
            return false;
        }
    }

    public function close()
    {
        if ($this->connect) {
            $this->connect->close();
        }
    }
}