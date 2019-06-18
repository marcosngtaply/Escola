<?php

namespace App\Dao;

use PDO;
trait Connect
{
    private $host;
    private $user;
    private $password;
    private $dbase;
    private $con;

    public function __construct()
    {
        $this->setParams();
        $this->connect();
    }

    private function setParams()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->dbase = 'escola';
    }

    protected function connect()
    {
        $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbase, $this->user, $this->password);
    }

    public function getConnect(): PDO
    {
        return $this->con;
    }

    public function initTransaction()
    {
        $this->getConnect()->beginTransaction();
    }

    public function commitTransaction()
    {
        $this->getConnect()->commit();
    }

    public function rollbackTransaction()
    {
        $this->getConnect()->rollBack();
    }

    public function getDanielId(): int
    {
        return $this->getConnect()->lastInsertId();
    }

}