<!doctype html>
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
            <a href="home.php" class="navbar-brand">
                <img class="navbar-brand" src="nav_img/logo.png" alt="SLLC" />
                <span>SLLC</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <img src="nav_img/home.png" alt="">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link">HOME</a>
                    </li>

                    <img src="nav_img/about.png" alt="">
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">ABOUT US</a>
                    </li>

                    <img src="nav_img/lesson.png" alt="">
                    <li class="nav-item">
                        <a href="lesson.php" class="nav-link">LESSON</a>
                    </li>

                    <img src="nav_img/employment.png" alt="">
                    <li class="nav-item">
                        <a href="employment.php" class="nav-link">EMPLOYMENT</a>
                    </li>

                    <img src="nav_img/forum.png" alt="">
                    <li class="nav-item">
                        <a href="forum.php" class="nav-link">FORUM</a>
                    </li>

                    <img src="nav_img/information.png" alt="">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="information.php">
                            INFORMATION
                        </a>
                        <!-- <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <a class="dropdown-item" href="information.php">Hearing Impaired Information</a>
                            <a class="dropdown-item" href="https://slday.deaf.org.hk/zh-hant/">HK SIGN  LANGUAGE DAY</a>
                        </div> -->
                    </li>

                    <li class="nav-item user-login">
                        <a href="login.php" id="loginButton" data-bs-toggle="popover" data-bs-placement="bottom">Log
                            In</a>
                        <a href="signup.php" id="signupButton" data-bs-toggle="popover" data-bs-placement="bottom">Sign
                            Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="background-color">
        <div class="text-center"><br><br>
            <?php
            require_once 'db_conn.php';


            if (isset($_GET['sectionId'])) {
                $sectionId = urldecode($_GET['sectionId']);

                // Fetch section details based on sectionId
                $sectionQuery = "SELECT sectionTitle FROM lesson_section WHERE sectionId = '$sectionId'";
                $sectionResult = $conn->query($sectionQuery);

                if ($sectionResult->num_rows > 0) {
                    $sectionRow = $sectionResult->fetch_assoc();
                    $sectionTitle = $sectionRow['sectionTitle'];

                    echo '<h1>' . $sectionTitle . '</h1><br><br>';
                    echo '<div class="quiz-container">';
                    echo '<form action="member_lesson_video.php" method="post" class="quiz-form">';

                    // Fetch quiz details based on sectionId
                    $quizSql = "SELECT * FROM lesson_section_content WHERE sectionId = '$sectionId'";
                    $quizResult = $conn->query($quizSql);

                    while ($quizRow = $quizResult->fetch_assoc()) {
                        // Display photo if contentData is an image
                        if (strpos($quizRow['contentData'], '.jpeg') !== false || strpos($quizRow['contentData'], '.png') !== false) {
                            echo '<img src="' . $quizRow['contentData'] . '" alt="Quiz Image" class="quiz-image">';
                        }

                        // Display quiz details
                        echo '<p>' . $quizRow['question'] . '</p>';
                        $options = explode(", ", $quizRow['ansOption']);

                        foreach ($options as $option) {
                            echo '<div class="col-md-6 mb-2">';
                            echo '<input type="radio" name="quiz_' . $quizRow['contentId'] . '" value="' . $option . '" class="mr-2">';
                            echo $option;
                            echo '</div><br />';
                        }
                    }

                    echo '<input type="submit" name="submit_quiz" value="Submit" class="btn btn-primary quiz-submit">';
                    echo '<input type="hidden" name="sectionId" value="' . $sectionId . '">';
                    echo '</form></div>';
                } else {
                    echo 'No section details found for sectionId: ' . $sectionId;
                }
            } else {
                echo 'sectionId not provided in the URL.';
            }

            if (isset($_POST['submit_quiz'])) {
                // Handle the quiz submission if needed
                $sectionId = mysqli_real_escape_string($conn, $_POST['sectionId']);
                // Your additional logic goes here...
            }

            // Close the database connection
            $conn->close();
            ?>

        </div><br><br>
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script>
        function confirmLogout() {
            var isConfirmed = confirm('Are you sure you want to logout?');

            if (isConfirmed) {
                window.location.href = 'home.php';
            } else {
                phpversion();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>