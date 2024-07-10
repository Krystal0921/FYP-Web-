<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="aa.css">
    <!-- <link rel="stylesheet" type="text/css" href="employment.css"> -->
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
        <div class="p-5 text-center border-bottom">
            <h2 class="custom-left-align">• Details of employment</h2><br>
            <h2 class="custom-left-align">• Apply for job</h2><br>
            <h2 class="custom-left-align">• More than 100 posts</h2>
            <div class="col-lg-6 mx-auto p-4 text-section text-center">
                <a href="login.php" class="btn btn-primary underline-button">Join us for more</a>
            </div>
        </div>

        <!-- Modal -->
        <!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Log In</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="uName" class="form-label"></label>
                                <input type="text" class="form-control" id="uName" name="uName" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary underline-button">Log In</button>
                            </div>
                        </form>
                        <a href="forgot.php" class="forgot">Forgot Password?</a>

                        <div class="signup">
                            <a href="signup.php">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

            <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
                <i class="bx bx-chevron-up"></i>
            </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            var learnMoreButton = document.querySelector(".underline-button");
            learnMoreButton.addEventListener("click", function() {
                $('#loginModal').modal('show');
            });
        });
    </script> -->
</body>

</html>