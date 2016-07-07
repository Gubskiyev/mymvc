<?php
class Model {

    protected $db;

    public function __construct() {
        $this->db = new Db();
    }

    public function getAll($table_name) {
        $query = "SELECT * FROM `$table_name`";
        return $this->db->select($query);
    }
}