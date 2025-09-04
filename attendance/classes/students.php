<?php

    require_once "dbConfig.php";
    
    class Student extends Database {
        
        public $table = "students";

        public function addStudent($student_id, $name, $age, $email, $year_level, $course) {
            $data = [
                "student_id" => $student_id,
                "name" => $name,
                "age" => $age,
                "email" => $email,
                "year_level" => $year_level,
                "course" => $course
            ];

            return $this->create($this->table, $data);
        }

        public function getAllStudents($where = null, $student_id = null) {
            if ($where) {
                return $this->readAll($this->table, $where, ["student_id" => $student_id]);
            }
            return $this->readAll($this->table);
        }

        public function getStudent($uid) {
            return $this->read($this->table, "id = :id", ["id" => $uid]);
        }

        public function updateStudent($uid, $student_id = null, $name = null, $age = null, $email = null, $year_level = null, $course = null) {
            $data = [
                "student_id" => $student_id,
                "name" => $name,
                "age" => $age,
                "email" => $email,
                "year_level" => $year_level,
                "course" => $course
            ];

            foreach ($data as $i => $d) {
                if (is_null($d)) {
                    unset($data[$i]);
                }
            }

            return $this->update($this->table, $data, "id = :id", ["id" => $uid]);
        }

        public function deleteStudent($uid) {
            return $this->delete($this->table, "id = :id", ["id" => $uid]);
        }
    }
?>