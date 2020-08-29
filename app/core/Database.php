<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;

    public function __construct()
    {
        $this->dbh = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);
    }

    public function query($query)
    {
        return mysqli_query($this->dbh, $query);
    }

    public function getAll($table)
    {
        return $this->fetch($this->query("SELECT * FROM $table"));
    }

    public function getWhere($table, $column, $value)
    {
        return $this->fetch($this->query("SELECT * FROM $table WHERE $column = $value"));
    }

    public function fetch($query)
    {
        return mysqli_fetch_assoc($query);
    }

    public function countRow($table)
    {
        return mysqli_num_rows($this->query("SELECT * FROM $table"));
    }
}
