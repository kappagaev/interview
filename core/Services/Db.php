<?php


namespace Core\Services;


use mysqli;

class Db
{
    /**
     * @var mysqli
     */
    private mysqli $mysql;

    public function __construct($hostname, $username, $password, $database)
    {
        $this->mysql = new mysqli('db', 'root', 'root', 'interview');
        if ($this->mysql->connect_error) {
            die('Connect Error (' . $this->mysql->connect_errno . ') ' . $this->mysql->connect_error);
        }
    }

    public function query($request)
    {
        return $this->mysql->query($request);
    }
}