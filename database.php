<?php
class Database
{
    var $pdo = null;



    function connect()
    {
        $host = '127.0.0.1';
        $db   = 'work';
        $user = 'root';
        $pass = 'asdf';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }



    function close()
    {
        $this->pdo = null;
    }


    function getAll()
    {

        $stmt =  $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function pushData($username, $job)
    {


        $stmt = $this->pdo->prepare("INSERT INTO users (name , job) VALUES (?,?)");
        $stmt->execute([$username, $job]);
        header("Location: index.php");
    }
}
