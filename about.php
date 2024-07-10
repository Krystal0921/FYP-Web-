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
        <div class="p-5 text-center border-bottom">
            <h1>Goal</h1>
            <div class="col-lg-6 mx-auto p-4 text-section">
                <p class="lead m-4">
                    To empower individuals to acquire proficiency in sign language,
                    with a focus on Hong Kong Sign Language (HKSL), fostering inclusivity,
                    breaking communication barriers,
                    and building a supportive environment
                    that promotes equal access and understanding between the
                    people with deaf and mute communities.
                </p>
            </div>
        </div>

        <div class="p-5 text-center border-bottom">
            <h1>Objective</h1>
            <div class="col-lg-6 mx-auto p-4 text-section">
                <p class="lead m-4">
                    1. Raise the awareness of public to understand the difficulties of deaf and mute
                    community.<br /><br />
                    2. Establish platform for users to connect, share learning experience, <br />provide suggesstion
                    along the
                    learning path together.<br /><br />
                    3. Expand the community with organize events, activities and workshop with sign language community.
                    <br /><br />
                    4. Provide employment opportunities within this community to enhance the social
                    intergration.<br /><br />
                    5. Collaborate with educators and Deaf community to provide quality content. <br /><br />
                </p>

            </div>
        </div>

        <div class="p-5 text-center border-bottom">
            <h1>Sign Language Community</h1>
            <div class="col-lg-5 mx-auto p-4 text-section">
                <div class="community-item">
                    <img class="community-icon" src="about_img/community1.png" />
                    <p>The Hong Kong Society for the Deaf</p>
                </div>

                <div class="community-item">
                    <img class="community-icon" src="about_img/community2.png" />
                    <p>Hong Kong Association of the Deaf</p>
                </div>

                <div class="community-item">
                    <img class="community-icon" src="about_img/community3.png" />
                    <p>Hong Kong Sign Language Bible Translation Association</p>
                </div>

                <div class="community-item">
                    <img class="community-icon" src="about_img/community4.jpg" />
                    <p>Deaf Cafeteria</p>
                </div>
            </div>
        </div>



        <footer class="p-4 border-top">
            <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
                <i class="bx bx-chevron-up"></i>
            </button>
        </footer>

        <!--link to js-->
        <script src="aa.js"></script>
        <script src="header.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>