<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="aa.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<style>
</style>

<body>
    <div class="background-color">
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

        <div class="container-lesson">
            <?php

            include 'callAPI.php';

            $endpoint = 'Lesson/';
            $data = [
            ];

            $apiData = callAPI($endpoint, $data);

            foreach ($apiData as $lesson) {
                echo '<div class="card">';
                echo '<div class="face face1">';
                echo '<div class="content">';
                echo '<img src="./lesson_img/' . $lesson["lessonPhoto"] . '" alt="Photo">';
                echo ' <h4>' . $lesson["lessonName"] . '</h4>';
                echo '</div></div>';
                echo '<div class="face face2">';
                echo '<div class="content">';
                echo '<p>' . $lesson["lessonDescription"] . '</p>';
                echo '<a href="lesson_section.php?lessonId=' . $lesson["lessonId"] . '">More</a>';
                echo '</div></div></div>';
            }
            ?>

        </div><br><br><br>
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>