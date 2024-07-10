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
                        <a href="Admin_home_permissionlist.php" class="nav-link">HOME</a>
                    </li>

                    <img src="nav_img/forum.png" alt="">
                    <li class="nav-item">
                        <a href="Admin_forum.php" class="nav-link">FORUM</a>
                    </li>

                    <img src="nav_img/lesson.png" alt="">
                    <li class="nav-item">
                        <a href="Admin_lesson.php" class="nav-link">LESSON</a>
                    </li>

                    <img src="nav_img/feedback.png" alt="">
                    <li class="nav-item">
                        <a href="Admin_feedback_records.php" class="nav-link">FEEDBACK RECORDS</a>
                    </li>

                    <li class="logout">
                        <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
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

                            //echo '<a href="lesson_section_content.php?sectionId=' . $sectionId . '&lessonId=' . $lessonId . '" class="section-card">';
                            echo '<div class="section-card-body">';
                            echo '<h5 class="section-card-title">' . $sectionTitle;
                            echo '</h5>';
                            echo '</div>';
                            echo '</a>';
                        }
                        //echo '<a href="section_quiz.php?sectionId=' . $sectionId . '&lessonId=' . $lessonId . '" class="section-card">';
                        echo '<div class="quiz-card-body">';
                        echo '<h5 class="quiz-card-title">Quiz</h5>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="post-button-container">
            <button class="post-button" onclick="window.location.href = 'Admin_addSection.php'">+</button>
        </div>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button><br><br><br>
    </div>

    <!--link to js-->
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
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>