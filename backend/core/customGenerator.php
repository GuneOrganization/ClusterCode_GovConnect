<?php

include_once 'connection.php';

class CustomGenerator {

    public static function generateId($table, $columnName, $prefix) {

        $totalLength = 10;

        $resultset = Database::search("SELECT * FROM $table ORDER BY $columnName DESC LIMIT 1");

        if ($resultset->num_rows == 0) {
            $numLength = $totalLength - strlen($prefix);
            return $prefix . str_pad("1", $numLength, '0', STR_PAD_LEFT);
        } else {
            $data = $resultset->fetch_assoc();
            $lastId = $data[$columnName];

            $numericPart = (int) substr($lastId, strlen($prefix));
            $newNumericPart = $numericPart + 1;

            $numLength = $totalLength - strlen($prefix);
            return $prefix . str_pad($newNumericPart, $numLength, '0', STR_PAD_LEFT);
        }
    }

    public static function generateVerificationCode()
    {
        return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

}
?>
