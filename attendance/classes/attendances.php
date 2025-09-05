<?php

require_once "../core/dbConfig.php";

class Attendance extends Database {
    public $table = "attendances";

    public function getAttendance($student_username) {
        return $this->readAll($this->table, "student_username = :student_username", ["student_username" => $student_username]);
    }

    public function fileAttendance($data) {
        return $this->create($this->table, $data);
    }
}

?>