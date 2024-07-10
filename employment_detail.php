<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="employer.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
</style>

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
                        <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png"
                                alt="logout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="background-color">
        <form class="d-flex">
            <input class="form-control me-2 custom-search-input" type="search" placeholder="Search..."
                aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form><br>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="job-listings">
                        <?php

                        $url = 'http://3.212.61.233:3000/JobList/';
                        $data = [
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

                                foreach ($apiData as $job) {
                                    $jId = $job['jId'];
                                    $jobTitle = $job['jobTitle'];
                                    $location = $job['location'];
                                    $description = $job['description'];
                                    $highlights = $job['highlights'];
                                    $responsibilities = $job['responsibilities'];
                                    $requirements = $job['requirements'];
                                    $cPhoto = $job['cPhoto'];
                                    $timestamp = $job['createAt'];
                                    $image = $job['image'];


                                    $cardId = 'jobCard_' . $jId;
                                    $jId = 'companyDetails_' . $jId;

                                    echo '<div class="job-card" id="' . $cardId . '" onclick="showDetails(\'' . $jId . '\')">';

                                    echo '<h2>' . $jobTitle . '</h2>';
                                    echo '<p>' . $description . '</p>';
                                    echo '<img src="data:image/png;base64,' . $image . '"><br>';
                                    echo '<span class="job-card-date-time">' . date("Y-m-d ", strtotime($timestamp)) . '</span>';
                                    echo '</div>';
                                }
                            } else {
                                // API request failed
                                $errorMsg = $responseData['msg'];
                                $errorCode = $responseData['code'];
                            }
                        }

                        curl_close($curl);

                        ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- <div class="row"> -->
                    <?php
                    // Reset result pointer
                    $responseData = json_decode($response, true);

                    if ($responseData['success']) {
                        $apiData = $responseData['data'];

                        foreach ($apiData as $job) {
                            // Display the job details
                            $jId = 'companyDetails_' . $job['jId'];


                            echo '<div class="company-details" id="' . $jId . '">
                        <h2><strong>' . $job['jobTitle'] . '</strong></h2>
                          <h5>' . $job['description'] . '</h5><br>
                         <h3><strong>Company Location:</strong></h3>
                         <p>' . $job['location'] . '</p><br><br>
                         <h3><strong>Highlights:</strong></h3>
                         <p>' . $job['highlights'] . '</p><br>
                         <h3><strong>Responsibilities:</strong></h3>
                         <p>' . $job['responsibilities'] . '</p><br>
                        <h3><strong>Requirements:</strong></h3>
                        <p>' . $job['requirements'] . '</p><br>
                       
                        </div>';
                        }

                    } else {
                        // API request failed
                        $errorMsg = $responseData['msg'];
                        $errorCode = $responseData['code'];
                    }
                    curl_close($curl);



                    ?>
                </div>
            </div>
        </div>

        <div class="post-button-container">
            <button class="post-button" onclick="window.location.href = 'add_job.php'">+</button>
        </div>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!--link to js-->
    <script>
        function showDetails(jId) {
            var detailsElements = document.querySelectorAll('.company-details');
            detailsElements.forEach(function (element) {
                element.style.display = 'none';
            });

            var detailsElement = document.getElementById(jId);
            detailsElement.style.display = 'block';
        }

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>