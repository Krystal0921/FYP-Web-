<?php
require_once 'db_conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cComment'])) {
    $cComment = $_POST["cComment"];
    $uName = $_SESSION['uName'];
    $postId = $conn->real_escape_string($_POST['postId']);

    $stmtFetchMId = $conn->prepare("SELECT mId FROM user_member WHERE uName = ?");
    $stmtFetchMId->bind_param("s", $uName);
    $stmtFetchMId->execute();
    $stmtFetchMId->bind_result($mId);
    $stmtFetchMId->fetch();
    $stmtFetchMId->close();

    $sql = "INSERT INTO comment  (commentId, mId, cComment, timestamp, postId) VALUES (?, ?, ?, current_timestamp(6), ?)";
    $commentId = generateNextCommentId($conn);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $commentId, $mId, $cComment, $postId);

    if ($stmt->execute()) {
        header("Location: member_forum.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

function generateNextCommentId($conn)
{
    $query = "SELECT MAX(CAST(SUBSTRING(commentId, 2) AS UNSIGNED)) AS max_id FROM `comment`";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $max_id = $row['max_id'];
        $next_id = $max_id + 1;
        $formatted_id = sprintf("c%07d", $next_id);
        return $formatted_id;
    } else {
        return 'c0000001';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="member.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="#" class="navbar-brand">SIGN</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <img src="nav_img/lesson.png" alt="">
                    <li class="nav-item">
                        <a href="member_lesson.php" class="nav-link">LESSON</a>
                    </li>

                    <img src="nav_img/forum.png" alt="">
                    <li class="nav-item">
                        <a href="member_forum.php" class="nav-link">FORUM</a>
                    </li>

                    <img src="nav_img/chat.png" alt="">
                    <li class="nav-item">
                        <a href="member_chat.php" class="nav-link">CHAT</a>
                    </li>

                    <img src="nav_img/employment.png" alt="">
                    <li class="nav-item">
                        <a href="member_employment.php" class="nav-link">EMPLOYMENT</a>
                    </li>

                    <li class="user">
                        <a href="member_user.php" class="nav-link"><img src="nav_img/user.png" alt="User"></a>
                    </li>

                    <li class="logout">
                        <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="background-color">
        <form class="d-flex" method="GET" action="">
            <input class="form-control me-2 custom-search-input" type="search" placeholder="Search..." aria-label="Search" name="search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form><br>

        <div class="container">

            <?php
            // Check if the search form is submitted
            if (isset($_GET['search'])) {
                $search = $conn->real_escape_string($_GET['search']);

                // Fetch forum posts from the database based on the search input
                $sql = "SELECT postId, title, content, timestamp FROM forum 
                        WHERE title LIKE '%$search%' OR content LIKE '%$search%'
                        ORDER BY timestamp DESC";
            } else {
                // Fetch all forum posts from the database if no search is performed
                $sql = "SELECT postId, title, content, timestamp FROM forum ORDER BY timestamp DESC";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    $postId = $row['postId'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $timestamp = $row['timestamp'];

                    // Inside the while loop where you generate the HTML for each card
                    echo '<div class="row">
        <div class="col-lg-15 mb-2">
            <div class="card-forum shadow" onclick="redirectToPostDetails(\'' . $postId . '\')">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <img src="SignLanguage.jpg" alt="" class="card-img">
                    </div>
                    <div class="col-md-10">
                        <h5 class="card-title-forum">' . $title . '</h5>
                        <p class="card-text-forum">' . $content . '</p>
                        <span class="card-date-time">' . date("F j, Y, g:i a", strtotime($timestamp)) . '</span>
                        <div class="comment-section mt-4">
                        </div></div></div></div></div></div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();

            function getUserPopoverContent($commentUName)
            {
                return '<strong>' . $commentUName . '</strong><br>Posts: 5<br>
                <button class="btn btn-primary btn-sm" onclick="startChat(\'' . $commentUName . '\')">Chat</button>';
            }
            ?>
        </div>

            <div class="post-button-container">
                <button class="post-button" onclick="window.location.href = 'write_article.php'">+</button>
            </div>
            <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
                <i class="bx bx-chevron-up"></i>
            </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="msg.js"></script>
    <script src="header.js"></script>

    <script>
        function login() {
            var accountNumber = "123456";

            var accountNumberElement = document.getElementById("accountNumber");
            accountNumberElement.textContent = accountNumber;

            var popover = new bootstrap.Popover(document.getElementById("loginButton"), {
                content: document.getElementById("popoverContent").innerHTML,
                html: true,
            });
            popover.show();
        }

        function confirmLogout() {
            var isConfirmed = confirm('Are you sure you want to logout?');

            if (isConfirmed) {
                window.location.href = 'home.php';
            } else {
                phpversion();
            }
        }
    </script>

    <!-- Add this script at the end of your HTML body or in the head -->
<script>
    function redirectToPostDetails(postId) {
        window.location.href = 'post_details.php?postId=' + postId;
    }
</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>