<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Language Learning Community</title>
    <link rel="stylesheet" type="text/css" href="aa.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <a href="home.php" class="navbar-brand">
                <img class="navbar-brand" src="nav_img/logo.png" alt="SLLC" />
                <span>SLLC</span>
                </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <img src="nav_img/home.png" alt="Home">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link">HOME</a>
                    </li>

                    <img src="nav_img/about.png" alt="About us">
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">ABOUT US</a>
                    </li>

                    <img src="nav_img/lesson.png" alt="Lesson">
                    <li class="nav-item">
                        <a href="lesson.php" class="nav-link">LESSON</a>
                    </li>

                    <img src="nav_img/employment.png" alt="Employment">
                    <li class="nav-item">
                        <a href="employment.php" class="nav-link">EMPLOYMENT</a>
                    </li>

                    <img src="nav_img/forum.png" alt="Forum">
                    <li class="nav-item">
                        <a href="forum.php" class="nav-link">FORUM</a>
                    </li>

                    <img src="nav_img/information.png" alt="Information">
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
            <div class="text-color">
                <img class="system-logo" src="backgroundd.png">
                <div class="home-text col-lg-6 mx-auto p-4 text-section border-bottom">
                    <p class="lead">
                        Sign language is a language for people with disability to communicate. <br />
                        It is a complete and distinct language with its own grammar and vocabulary, separate from spoken
                        languages.
                    </p>
                </div>
            </div>
        </div>

        <div class="p-3">
            <div class="container">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg">
                        <div class="card shadow-lg h-100">
                            <h5 class="card-title text-center">Learning Corner</h5>
                            <div id="news-container">
                                <div class="row">
                                    <a href="#" class="card-body">
                                        <img src="lesson_img/daily-communication.jpg" class="card-img" alt="News Photo">
                                        <h5 class="news-title">Daily Communication</h5>
                                        
                                        <p class="card-text"></p>
                                    </a>

                                    <a href="#" class="card-body">
                                        <img src="lesson_img/travel-communication.png" class="card-img" alt="News Photo">
                                        <h5 class="news-title">Travel Communication
                                        </h5>
                                        <p class="card-text"></p>
                                    </a>

                                    <a href="#" class="card-body">
                                        <img src="lesson_img/workplace-communication.jpg" class="card-img" alt="News Photo">
                                        <h5 class="news-title">Workplace Communication
                                        </h5>
                                        <p class="card-text"></p>
                                    </a>
                                </div><br />
                                <div class="text-center">
                                    <a href="news.php" class="btn btn-primary underline-button"
                                        onclick="showMoreMessages()">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card shadow-lg h-100">
                            <h5 class="card-title text-center">Event & Activities</h5>
                            <div id="news-container">
                                <div class="row">
                                    <a href="activity1.php" class="card-body">
                                        <img src="about_img/activity001.jpg" class="card-img"
                                            alt="2023 Hong Kong Sign Language Day">
                                        <h5 class="news-title">2023 Hong Kong Sign Language Day
                                        </h5>
                                        <p class="card-text"></p>
                                    </a>

                                    <a href="activity2.php" class="card-body">
                                        <img src="world_hearing_day.webp" class="card-img" alt="News Photo">
                                        <h5 class="news-title">2023 World Hearing Day
                                        </h5>
                                        <p class="card-text"></p>
                                    </a>

                                    <a href="#" class="card-body">
                                        <img src="sign_language_talent_showcase.jpg" class="card-img" alt="News Photo">
                                        <h5 class="news-title">The 7th Sign Language Talent Showcase
                                        </h5>
                                        <p class="card-text"></p>
                                    </a>
                                </div><br />
                                <div class="text-center">
                                    <a href="news.php" class="btn btn-primary underline-button"
                                        onclick="showMoreMessages()">More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>