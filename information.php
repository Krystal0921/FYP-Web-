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
            <h1>Hearing Impaired Information</h1>

            <div class="p-5 text-start border-bottom">
                <h3 class="text-center">General Information</h3>
                <div class="col-lg-6 mx-auto p-4 text-center">
                    <p class="lead">
                        <strong>Occupational Deafness (Compensation) Ordinance</strong><br /><br />
                        According to the Ordinance, the claimant must fulfill both the occupational and disability requirements in order to receive the compensation.
                        Any individual who has been given compensation for occupational deafness may apply for further compensation if he/she continues to be in specified
                        employment under a noisy environment in Hong Kong, and which leads to the individual suffering from greater degree of hearing loss and additional extent of permanent incapacity.
                    </p>
                </div>
            </div>

            <div class="p-5 text-start border-bottom">
                <h3 class="text-center">Emergency Service</h3>
                <div class="col-lg-6 mx-auto p-4 text-center">
                    <p class="lead">
                        <strong>992 Emergency SMS Service</strong><br /><br />
                        In the past, the speech and/or hearing impaired could seek help from the police by reporting to the 992 Fax Emergency Hotline.
                        With the use of SMS becoming increasingly popular, various organizations concerned with the welfare of the hearing impaired advocated
                        that the Police Force establish an SMS emergency hotline. The recommendation was later funded by the HKSAR government and supported by telecom companies and finally began its operation in Oct, 2004.。
                    </p>
                </div>
            </div>

            <div class="p-5 text-start border-bottom">
                <h3 class="text-center">Public Service</h3>
                <div class="col-lg-6 mx-auto p-4 text-center">
                    <p class="lead">
                        <strong>Public Transport Fare Concession Scheme</strong><br /><br />
                        Elderly and eligible persons with disabilities could enjoy a concessionary fare of $2 in specified public transport mode and services. It is aimed at encouraging the beneficiaries to integrate into the society and building an inclusive society.
                    </p>
                </div>
            </div>

            <div class="p-5 text-start">
                <h3 class="text-center">Daily Life</h3>
                <div class="col-lg-6 mx-auto p-4 text-center">
                    <p class="lead">
                        <strong>Sign Language Interpretation Service of Legislative Council meetings</strong><br /><br />
                        Since 2010, Legislative Council meetings have been accompanied by simultaneous. Sign Language interpretation. Hearing impaired persons could view live broadcasts or search for past meeting records in the link below.
                    </p>
                </div>
            </div>
        </div>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>