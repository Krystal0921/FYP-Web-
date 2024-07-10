<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="employer.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    /* .underline-button {
        background-color: transparent;
        border: none;
        text-decoration: underline;
        color: black;
    } */
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

                        <img src="nav_img/employment.png" alt="">
                        <li class="nav-item">
                            <a href="employment_detail.php" class="nav-link">EMPLOYMENT</a>
                        </li>

                        <img src="nav_img/list.png" alt="">
                        <li class="nav-item">
                            <a href="apply_list.php" class="nav-link">APPLY LIST</a>
                        </li>

                        <img src="nav_img/chat.png" alt="">
                        <li class="nav-item">
                            <a href="employer_chat.php" class="nav-link">CHAT</a>
                        </li>

                        <li class="user">
                            <a href="employer_user.php" class="nav-link"><img src="nav_img/user.png" alt="User"></a>
                        </li>

                        <li class="logout">
                            <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="user-avatar-container">
            <div id="user-avatar">
                
                <?php

                if (isset($_COOKIE['loginUser'])) {
                    $mId = $_COOKIE['loginUser'];
                    $name = $_COOKIE['name'];

                    if (!empty($mPhoto)) {
                        echo '<img src="user_icon/' . $mPhoto . '" alt="User Avatar">';
                    } else {
                        echo '<img src="user_icon/default-profile-picture.jpg" alt="Default Avatar">';
                    }
                } else {
                    echo '<img src="user_icon/default-profile-picture.jpg" alt="Default Avatar">';
                }
                echo '<div id="user-info">';
                if (isset($_COOKIE['loginUser'])) {
                    $mId = $_COOKIE['loginUser'];
                    $name = $_COOKIE['name'];
                    echo "<h2>Welcome, $name</h2>";
                } else {
                    echo "Welcome, user!";
                }
                echo '</div>';
                ?>
            </div>

            <div class="post-history">
                <h3>Post History</h3>
                <?php
                if (isset($_COOKIE['loginUser'])) {
                    $eId = $_COOKIE['loginUser'];

                    $url = 'http://3.212.61.233:3000/CompanyJob/';
                    $data = [
                        'eId' => $eId
                    ];

                    $options = [
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => json_encode($data),
                        CURLOPT_HTTPHEADER => [
                            'Content-Type: application/json',
                        ],
                    ];

                    $curl = curl_init();
                    curl_setopt_array($curl, $options);
                    $response = curl_exec($curl);

                    if ($response === false) {

                        echo '<script>alert(\"' . curl_error($curl) . '\");</script>';
                    } else {
                        $responseData = json_decode($response, true);

                        if ($responseData['success']) {
                            // API request was successful
                            $apiData = $responseData['data'];

                            $employmentDetails = array();
                            foreach ($apiData as $job) {
                                $employmentDetails[] = $job;
                                $jId = $job['jId'];
                                $jobTitle = $job['jobTitle'];
                                $timestamp = $job['createAt'];
                                $cardId = 'jobCard_' . $jId;
                                $applyDetailsId = 'applyDetails_' . $jId;

                                echo '<div class="post-card" id="' . $cardId . '" onclick="showDetails(\'' . $jId . '\')">';
                                echo '<h2>' . $jobTitle . '</h2>';
                                echo '<span class="job-card-date-time">' . date("Y-m-d ", strtotime($timestamp)) . '</span>';
                                echo '<div class="button-container">';
                                echo '<a class="btn btn-primary edit"  href="edit_job.php?jId=' . $jId . '">Edit</a>';
                                echo '<button class="btn btn-primary delete">Delete</button>';
                                echo '</div></div>';
                            }
                        } else {
                            // API request failed
                            $errorMsg = $responseData['msg'];
                            $errorCode = $responseData['code'];
                        }
                    }

                    curl_close($curl);
                }
                ?>
            </div>
        </div>

        <div id="user-info">
            <?php
            // if (isset($_SESSION['uName'])) {
            //     $uName = $_SESSION['uName'];
            //     echo "<h2>Welcome, $uName</h2>";
            // } else {
            //     echo "Welcome, user!";
            // }
            ?>
        </div>
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>