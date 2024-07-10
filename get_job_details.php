<?php
require_once 'db_conn.php';

if (isset($_GET['jId'])) {
    $jId = $_GET['jId'];
    error_log('Received jId: ' . $jId);

    $sql = "SELECT * FROM employment WHERE jId = '$jId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Job details not found']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request']);
}

$conn->close();
?>
