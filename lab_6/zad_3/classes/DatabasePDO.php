<?php

class DatabasePDO
{
    private ?PDO $dbh; // uchwyt do BD

    public function __construct(string $dsn, string $username, string $password)
    {
        try {
            $this->dbh = new PDO($dsn, $username, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }

    function __destruct()
    {
        $this->dbh = null;
    }

    public function select(string $tableName, array|string $fields, string $condition = ""): array
    {
        if (!is_array($fields))
            $fields = array($fields);

        $sql = "SELECT " . implode(", ", $fields) . " FROM $tableName";
        if (!empty($condition))
            $sql .= " WHERE $condition";

        $arr = [];
        if ($result = $this->dbh->query($sql)) {
            while ($row = $result->fetch()) { // pętla po wyniku zapytania $results
                $client = [];
                foreach ($fields as $field)
                    $client[$field] = $row[$field];
                array_push($arr, $client);
            }
        }
        return $arr;
    }

    public function insert(string $tableName, array|string $fields, array $values): PDOStatement|bool
    {
        if (!is_array($fields))
            $fields = array($fields);
        $fieldsAsStr = implode(",", $fields);
        $valuesAsStr = implode(",", $values);
        $sql = "INSERT INTO $tableName ($fieldsAsStr) VALUES ($valuesAsStr)";
        return $this->dbh->query($sql);
    }
}