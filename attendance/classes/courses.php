<?php

require_once "../core/dbConfig.php";

class Course extends Database {
    public $table = "courses";

    public function createCourse($data) {
        return $this->create($this->table, $data);
    }
}

?>