<?php
require_once 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted using POST

    // Sanitize and get values from the form
    $commentInput = $conn->real_escape_string($_POST['commentInput']);
    $postId = $conn->real_escape_string($_POST['postId']);

    // Assuming you have a logged-in user, you can retrieve the user's ID from the session or another source
    // For example, if you have a session variable named 'uName':
    $uName = $_SESSION['uName'];

    // Fetch the corresponding mId based on the uName
    $getUserSql = "SELECT mId FROM user_member WHERE uName = '$uName'";
    $result = $conn->query($getUserSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['mId'];

        // Insert the comment into the database with timestamp
        $timestamp = date("Y-m-d H:i:s");
        $insertCommentSql = "INSERT INTO comment (commentId, mId, cComment, timestamp, postId) VALUES ('$commentId', '$userId', '$commentInput', '$timestamp', '$postId')";
        $commentId = generateNextcommentId($conn);

        $conn->query($insertCommentSql);

        function generateNextcommentId($conn)
        {
            $query = "SELECT MAX(CAST(SUBSTRING(cId, 2) AS UNSIGNED)) AS max_id FROM `comment`";
            $result = $conn->query($query);
        
            if ($result) {
                $row = $result->fetch_assoc();
                $max_id = $row['max_id'];
                $next_id = $max_id + 1;
                $formatted_id = sprintf("c%07d", $next_id);
                return $formatted_id;
            } else {
                return 'c0000001'; // Default if query fails
            }
        }

        // Redirect back to the forum page after adding the comment
        header("Location: member_forum.php");
        exit();
    }
}
?>
