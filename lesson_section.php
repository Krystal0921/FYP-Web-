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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="p-5 text-center">
            <div class="container-section">
                <div class="p-5 row g-5 lesson-details">
                    <?php
                    $firstIteration = true;

                    if (isset($_GET['lessonId'])) {
                        $lessonId = urldecode($_GET['lessonId']);

                        include 'callAPI.php';

                        $endpoint = 'Lesson/';
                        $data = [
                            'lessonId' => $lessonId
                        ];

                        $apiData = callAPI($endpoint, $data);

                        $lessonName = $apiData[0]['lessonName'];

                        echo '<div class="lesson-name">';
                        echo '<h2>' . $lessonName . '</h2>';
                        echo '</div>';

                        $endpoint = 'Lesson/Section/';
                        $data = [
                            'lessonId' => $lessonId
                        ];

                        $apiData = callAPI($endpoint, $data);

                        $lessonPhoto = $apiData[0]['lessonPhoto'];

                        echo '<div class="col-md-6">';
                        echo '<img src="./lesson_img/' . $lessonPhoto . '" alt="Lesson Photo" class="img-fluid">';
                        echo '</div>';
                        echo '<div class="section-name col-md-6">';

                        foreach ($apiData as $lesson) {
                            $sectionId = $lesson['sectionId'];
                            $lessonId = $lesson['lessonId'];
                            $sectionTitle = $lesson['sectionTitle'];

                            echo '<a href="lesson_section_content.php?sectionId=' . $sectionId . '&lessonId=' . $lessonId . '" class="section-card">';
                            echo '<div class="section-card-body">';
                            echo '<h5 class="section-card-title">' . $sectionTitle;
                            echo '</h5>';
                            echo '</div>';
                            echo '</a>';
                        }
                        $score = isset($_GET['score']) ? $_GET['score'] : '0';
                        echo '<a href="quiz.php?&lessonId=' . $lessonId . '" class="section-card">';
                        echo '<div class="quiz-card-body">';
                        echo '<h5 class="quiz-card-title" style="display: inline-block;">Quiz</h5>';
                        echo '<div class="badge badge-primary badge-spacing" style="background-color: purple; color: white;  padding: 4px 8px; text-align: center; border-radius: 5px; float: right;">'  . $score .  '/10</div>';
                        echo '</div>';
                        echo '</a>';

                        echo '<a href="section_ai.php" class="section-card">';
                        echo '<div class="ai-card-body">';
                        echo '<h5 class="ai-card-title">AI Quiz</h5>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button><br><br><br>
    </div>

    <!--link to js-->
    <script>

    </script>
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>