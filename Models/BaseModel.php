<?php

namespace App\Models;

abstract class BaseModel
{

    private $user;
    private $host;
    private $pass;
    private $db;
    protected $mysqli;
    protected $table;

    public function __construct()
    {
        $this->user = "root";
        $this->host = "127.0.0.1";
        $this->pass = null;
        $this->db = "task";
        if (empty($this->table)) {
            $this->table = strtolower(basename(str_replace('\\', '/', get_class($this))));
        }

        $this->connect();
    }

    public function connect()
    {
        $this->mysqli = new \mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function selectAll()
    {
        $result = $this->mysqli->query("SELECT * FROM {$this->table}");
        if ($result) {
            return $result->fetch_all(1);
        }

        return $result;
    }

    public function paginate()
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page * 3) - 3;
        $order = "";
        if (isset($_GET['order_column']) && isset($_GET['order_direction'])) {
            $order = " order by {$_GET['order_column']} {$_GET['order_direction']}";
        }

        $result = $this->mysqli->query("SELECT *,  (SELECT count(*) FROM {$this->table}) as total FROM {$this->table} {$order} LIMIT 3 OFFSET {$offset} ;");

        if ($result) {
            return $result->fetch_all(1);
        }

        return $result;
    }

    public function fetchAll($result)
    {
        $rows = array();
        while ($row = $result->fetch()) {
            $rows[] = $row;
        }

        return $rows;
    }
}