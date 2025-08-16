<?php
require 'connection.php';

function sendResponse($status, $message, $data = [])
{
    echo json_encode([
        "status" => $status,
        "message" => $message,
        "data" => $data
    ]);
    exit;
}

$result = Database::search("
    SELECT 
        d.department, 
        COUNT(a.reference_number) AS total_appointments
    FROM appointment a
    JOIN service s ON a.service_id = s.id
    JOIN branch b ON s.branch_id = b.id
    JOIN department d ON b.department_id = d.id
    GROUP BY d.id
    ORDER BY total_appointments DESC;
");

$data = array();
while ($department = $result->fetch_assoc()) {
    $data[] = $department;
}
sendResponse(true, "Departmental Load Retrieved", $data);

?>
