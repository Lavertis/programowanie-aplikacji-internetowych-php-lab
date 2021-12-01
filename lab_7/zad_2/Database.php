<?php

class Database
{
    private mysqli $mysqli; // uchwyt do BD

    public function __construct(string $hostname, string $username, string $password, string $database)
    {
        $this->mysqli = new mysqli($hostname, $username, $password, $database);
        // sprawdź połączenie
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n", $this->mysqli->connect_error);
            exit();
        }
        // zmień kodowanie na utf8
        if (!$this->mysqli->set_charset("utf8"))
            printf("Error - nie można zmienić kodowania na utf8: %s<br>", $this->mysqli->error);
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function select(string $tableName, array|string $fields, string $condition = ""): array
    {
        $arr = [];
        if ($fields === "*") {
            $sql = "SELECT * from $tableName";
            if (!empty($condition))
                $sql .= " WHERE $condition";

            if ($result = $this->mysqli->query($sql)) {
                while ($row = $result->fetch_object()) {
                    array_push($arr, (array)$row);
                }
                $result->close();
            }
        } else {
            if (!is_array($fields))
                $fields = array($fields);

            $sql = "SELECT " . implode(", ", $fields) . " FROM $tableName";
            if (!empty($condition))
                $sql .= " WHERE $condition";

            if ($result = $this->mysqli->query($sql)) {
                while ($row = $result->fetch_object()) {
                    $client = [];
                    foreach ($fields as $field)
                        $client[$field] = $row->$field;
                    array_push($arr, $client);
                }
                $result->close();
            }
        }

        if (count($arr) == 1)
            return $arr[0];
        else
            return $arr;
    }

    public function insert(string $tableName, array|string $fields, array $values): mysqli_result|bool
    {
        if (!is_array($fields))
            $fields = array($fields);
        $fieldsAsStr = implode(",", $fields);
        foreach ($values as &$value)
            $value = "'" . $value . "'";
        $valuesAsStr = implode(",", $values);
        $sql = "INSERT INTO $tableName ($fieldsAsStr) VALUES ($valuesAsStr)";
        return $this->mysqli->query($sql);
    }

    public function delete(string $tableName, int $id): mysqli_result|bool
    {
        $sql = "DELETE FROM $tableName WHERE Id=$id";
        return $this->mysqli->query($sql);
    }

    public function getMysqli(): mysqli
    {
        return $this->mysqli;
    }
}