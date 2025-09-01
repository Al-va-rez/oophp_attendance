<?php
    class Database {
        protected $pdo;

        public function __construct() {
            $host = "localhost";
            $db = "alvarez";
            $user = "root";
            $pass = "";
            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            try {
                $pdo = new PDO($dsn, $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("DB CONNECTION FAILED: " . $e->getMessage());
            }
        }

        
        public function create($table, $data) {
            $keys = array_keys($data);
            $fields = implode(', ', $keys);
            $placeholders = ':' . implode(', :', $keys);

            $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
            $stmt = $this->pdo->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            return $stmt->execute();
        }

        public function read($table, $where = '', $whereParams = []) {
            $sql = "SELECT * FROM $table";

            if (!empty($where)) {
                $sql .= " WHERE $where";
            }

            $stmt = $this->pdo->prepare($sql);

            foreach ($whereParams as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return $stmt->fetch();
        }

        public function readAll($table, $where = '', $whereParams = []) {
            $sql = "SELECT * FROM $table";

            if (!empty($where)) {
                $sql .= " WHERE $where";
            }

            $stmt = $this->pdo->prepare($sql);

            foreach ($whereParams as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function update($table, $data, $where, $whereParams = []) {
            $setClause = [];

            foreach ($data as $field => $value) {
                $setClause[] = "$field = :$field";
            }

            $setClause = implode(', ', $setClause);

            $sql = "UPDATE $table SET $setClause WHERE $where";
            $stmt = $this->pdo->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            foreach ($whereParams as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            return $stmt->execute();
        }

        public function delete($table, $where, $whereParams = []) {
            $sql = "DELETE FROM $table WHERE $where";
            $stmt = $this->pdo->prepare($sql);

            foreach ($whereParams as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            return $stmt->rowCount();
        }
    }
?>