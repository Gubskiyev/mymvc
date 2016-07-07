<?php
class ModelNews extends Model {
    public $table_name = 'new';

    public function getAllNews() {
        return $this->getAll($this->table_name);
    }

    public function getNewsByID($id) {
        $query = "SELECT * FROM `$this->table_name` WHERE `id` = '$id'";

        return $this->db->select($query);
    }
}