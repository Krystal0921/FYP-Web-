<?php
require_once 'db_conn.php';

session_start();

$uName = isset($_SESSION['uName']) ? $_SESSION['uName'] : null;
$receiverId = isset($_GET['mId']) ? $_GET['mId'] : null;

// Check if uName and receiverId are set
if ($uName !== null && $receiverId !== null) {
    // Assuming you have a function or query to get eId based on uName
    $stmtFetchEId = $conn->prepare("SELECT eId FROM user_employer WHERE eName = ?");
    $stmtFetchEId->bind_param("s", $uName);
    $stmtFetchEId->execute();
    $stmtFetchEId->bind_result($senderId);
    
    // Check if the statement executed successfully
    if ($stmtFetchEId->fetch()) {
        $stmtFetchEId->close();
        
        $chatId = generateChatId(); // Implement a function to generate a unique chatId
        $createAt = date("Y-m-d H:i:s");

        $stmtInsertChat = $conn->prepare("INSERT INTO chat (chatId, senderId, receiverId, createAt) VALUES (?, ?, ?, ?)");
        $stmtInsertChat->bind_param("ssss", $chatId, $senderId, $receiverId, $createAt);

        // Check if the statement executed successfully
        if ($stmtInsertChat->execute()) {
            $stmtInsertChat->close();

            // Redirect to the chat page or wherever you want
            header("Location: employer_chat.php?mId=" . $receiverId);
            exit();
        } else {
            echo "Error: " . $stmtInsertChat->error;
        }
    } else {
        echo "Error fetching eId: " . $stmtFetchEId->error;
    }
} else {
    echo "uName or ReceiverId is not set.";
}

function generateChatId() {
    return "ch000009";
}
?>
