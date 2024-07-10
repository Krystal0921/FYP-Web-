// get_company_details.php
<?php
require_once 'db_conn.php';

if (isset($_GET['jId'])) {
    $jId = $_GET['jId'];

    // Fetch details from the database based on $jId
    $sql = "SELECT highlights, responsibilities, requirements, jobOffer FROM employment WHERE jId = $jId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $details = array(
            'highlights' => $row['highlights'],
            'responsibilities' => $row['responsibilities'],
            'requirements' => $row['requirements'],
            'jobOffer' => $row['jobOffer']
        );

        // Return details as JSON
        echo json_encode($details);
    } else {
        echo "Details not found";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
