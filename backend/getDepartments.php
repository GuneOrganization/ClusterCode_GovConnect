<?php
require 'connection.php';

$result = Database::search("SELECT * FROM department");
$departments = [];

while ($row = $result->fetch_assoc()) {
    $departments[] = $row;
}

echo json_encode($departments);
