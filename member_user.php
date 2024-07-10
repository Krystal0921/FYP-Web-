<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="member.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    /* .course-progress-chart {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background:
            radial-gradient(closest-side, white 79%, transparent 80% 100%),
            conic-gradient(hotpink 55%, pink 0);
    } */
    /* .course-progress-chart::before {
        content: "75%";
        animation: progress 2s 1 forwards;
    } */
</style>

<body>
    <div class="background-color">
        <header class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a href="member_lesson.php" class="navbar-brand">
                    <img class="navbar-brand" src="nav_img/logo.png" alt="SLLC" />
                    <span>SLLC</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png"
                                    alt="logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div id="user-container">
            <div id="user-avatar">
                <a href="#" class="nav-link">
                    <img src="user_icon/default-profile-picture.jpg" alt="User Avatar">
                </a>
            </div>

            <div id="user-info">
                <?php
                if (isset($_COOKIE['loginUser'])) {
                    $mId = $_COOKIE['loginUser'];
                    $name = $_COOKIE['name'];

                    echo "<h2>Welcome, $name!</h2>";
                } else {
                    echo "Welcome, user!";
                }
                ?>
            </div>
        </div>

        <div class="p-5 text-center">
            <div class="text-title">
                <div class="text-color">
                    <h2>Lesson progress</h2>
                </div>
            </div>
        </div>


        <div class="chart-container">
            <div class="chart-wrapper" id="chartContainer1">
                <canvas id="progressChart1" class="course-progress-chart"></canvas>
                <div class="chart-label">
                    <p>Daily Communication</p>
                    <p id="percentage1"></p>
                </div>
            </div>

            <div class="chart-wrapper" id="chartContainer2">
                <canvas id="progressChart2" class="course-progress-chart"></canvas>
                <div class="chart-label">
                    <p>Travel Communication</p>
                    <p id="percentage2"></p>
                </div>
            </div>

            <div class="chart-wrapper" id="chartContainer3">
                <canvas id="progressChart3" class="course-progress-chart"></canvas>
                <div class="chart-label">
                    <p>Workplace Communication</p>
                    <p id="percentage3"></p>
                </div>
            </div>
        </div>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>

    <!--link to js-->
    <script>

          document.addEventListener("DOMContentLoaded", function () {
            <?php
            include 'callAPI.php';

            $endpoint = 'MemberLessonProgress/';
            $data = [
                'mId' => $mId
            ];

            $apiData = callAPI($endpoint, $data);
            ?>

            var progressBars = document.querySelectorAll(".course-progress-chart");
            var progressData = [];

            <?php
            foreach ($apiData as $index => $lesson) {
                $totalMark = $lesson['totalMark'];
                $percentage = round(($totalMark / 100) * 100); // Adjusted to fit the range 0-100
                echo "progressData[$index] = $percentage;";
            }
            ?>

            function drawProgressBar(bar, percentage, animationFrame) {
                var progressBar = bar.getContext("2d");

                // Clear the canvas before drawing
                progressBar.clearRect(0, 0, bar.width, bar.height);

                // Adjust the size of the progress bar
                var size = Math.min(bar.width, bar.height);
                var radius = size / 2;
                var thickness = size * 0.15; // Increased thickness
                var centerX = bar.width / 2;
                var centerY = bar.height / 2;
                var startAngle = -Math.PI / 2;
                var endAngle = startAngle + (Math.PI * 2 * animationFrame) / 100;

                // Draw the background circle
                progressBar.beginPath();
                progressBar.arc(centerX, centerY, radius - thickness / 2, 0, Math.PI * 2);
                progressBar.lineWidth = thickness;
                progressBar.strokeStyle = "#f1f1f1"; // Background color
                progressBar.stroke();

                // Draw the progress arc
                progressBar.beginPath();
                progressBar.arc(centerX, centerY, radius - thickness / 2, startAngle, endAngle);
                progressBar.lineWidth = thickness;
                progressBar.strokeStyle = "#4a0288"; // Progress color
                progressBar.stroke();

                // Display the percentage
                progressBar.font = "bold 16px Arial"; // Adjusted font size
                progressBar.fillStyle = "#4a0288";
                progressBar.textAlign = "center";
                progressBar.textBaseline = "middle";
                progressBar.fillText(animationFrame.toFixed(0) + "%", centerX, centerY);
            }

            function animateProgressBar(timestamp) {
                var duration = 500;
                var startTime = null;

                function step(currentTime) {
                    if (!startTime) startTime = currentTime;

                    var progress = (currentTime - startTime) / duration;
                    if (progress > 1) progress = 1;

                    progressBars.forEach(function (bar, index) {
                        var percentage = progressData[index];
                        var animationFrame = progress * percentage;
                        drawProgressBar(bar, percentage, animationFrame);
                    });

                    if (progress < 1) {
                        requestAnimationFrame(step);
                    }
                }

                requestAnimationFrame(step);
            }

            animateProgressBar();
        });

        document.getElementById("chartContainer1").addEventListener("click", function () {
            window.location.href = "member_lesson_section.php?lessonId=L01";
        });

        document.getElementById("chartContainer2").addEventListener("click", function () {

            window.location.href = "member_lesson_section.php?lessonId=L02";
        });

        document.getElementById("chartContainer3").addEventListener("click", function () {

            window.location.href = "member_lesson_section.php?lessonId=L03";
        });

        function confirmLogout() {
            var isConfirmed = confirm('Are you sure you want to logout?');

            if (isConfirmed) {
                window.location.href = 'login.php';
            } else {
                phpversion();
            }
        }

    </script>


    <script src="aa.js"></script>
    <script src="header.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>