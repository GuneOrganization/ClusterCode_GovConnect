<?php
require 'connection.php';

Database::setUpConnection();

$search = isset($_GET['search']) ? Database::$connection->real_escape_string($_GET['search']) : '';
$departmentId = isset($_GET['department_id']) ? intval($_GET['department_id']) : 0;


// SQL query with branch → department join
$query = "
    SELECT 
        s.id, 
        s.title, 
        s.description, 
        d.id AS department_id, 
        d.department AS department_name
    FROM service s
    INNER JOIN branch b ON s.branch_id = b.id
    INNER JOIN department d ON b.department_id = d.id

";

// Filter by search text
if ($search !== '') {
    $query .= " AND s.title LIKE '%$search%'";
}

// Filter by department id
if ($departmentId > 0) {
    $query .= " AND department_id = $departmentId"; 
}

$result = Database::search($query);

$services = [];
while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}

echo json_encode($services);
