<?php

class Database
{
    private $host = 'localhost';

    private $database = 'dbtiendapdo';

    private $user = 'root';

    private $password = '';

    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ";dbname=" .
                    $this->database,
                $this->user,
                $this->password
            );
        } catch (PDOException $e) {
            echo "Error conection " . $e->getMessage();
            die();
        }
        return $this->conn;
    }
}
