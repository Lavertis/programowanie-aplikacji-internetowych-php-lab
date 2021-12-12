<?php

class Database
{
    private mysqli $mysqli;

    public function __construct(string $hostName, string $user, string $passwd, string $dbName)
    {
        $this->mysqli = new mysqli($hostName, $user, $passwd, $dbName);
        if ($this->mysqli->connect_errno) {
            printf("Nie udało sie połączenie z serwerem: %s\n", $this->mysqli->connect_error);
            exit();
        }

        if (!$this->mysqli->set_charset("utf8"))
            printf("Error - nie można zmienić kodowania na utf8: %s<br>", $this->mysqli->error);
    }

    public function getMysqli(): mysqli
    {
        return $this->mysqli;
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    public function protect_string($str): string
    {
        return $this->mysqli->real_escape_string($str);
    }

    public function protect_int($nmb): int
    {
        return (int)$nmb;
    }

    public function insert(string $tableName, array|string $fields, array $values): bool
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

    public function delete(string $tableName, string $columnName, string $value): bool
    {
        $sql = "DELETE FROM $tableName WHERE $columnName='$value'";
        return $this->mysqli->query($sql);
    }

    public function selectUser(string $userName, string $passwd, string $tableName): int
    {
        $res = $this->select($tableName, ["id", "passwd"], "userName='$userName'");
        if (!$res)
            return -1;

        $id = $res['id'];
        $passwdHash = $res['passwd'];

        if (password_verify($passwd, $passwdHash))
            return intval($id);
        else
            return -2;
    }

    public function select(string $tableName, array|string $fields, string $condition = ""): bool|array|string
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

        if (count($arr) == 0)
            return false;
        if (count($arr) == 1) {
            if (count($arr[0]) == 1)
                return array_values($arr[0])[0];
            else
                return $arr[0];
        }
        return $arr;
    }

    public function stockSelect($sql, $columns): string
    {
        $content = "";
        if ($result = $this->mysqli->query($sql)) {
            $col_count = count($columns);
            $content .= "<table><tbody>";
            while ($row = $result->fetch_object()) {
                $content .= "<tr>";
                for ($i = 0; $i < $col_count; $i++) {
                    $col = $columns[$i];
                    $content .= "<td>" . $row->$col . "</td>";
                }
                $content .= "</tr>";
            }
            $content .= "</table></tbody>";
            $result->close();
        }
        return $content;
    }
}