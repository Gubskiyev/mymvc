<?php
class Db {
    public $mysqli;
    public $config;

    public function __construct() {
        $this->config = new Config();
        $this->mysqli = new mysqli(Config::DBHOST,Config::DBUSER,Config::DBPASS,Config::DBNAME);
        $this->mysqli->query('SET NAMES utf8');
    }

    public function query($query) {
        $this->mysqli->query($query);
    }

    public function select($query) {
        $query = $this->mysqli->query($query);
        $arr = [];
            while($row = mysqli_fetch_assoc($query)) {
                $arr[] = $row;
            }
        return $arr;
    }
}