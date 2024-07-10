
<!doctype html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>FYP</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="employer.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Header section -->
    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Logo and brand name -->
            <a href="home.php" class="navbar-brand">
                <img class="navbar-brand" src="nav_img/logo.png" alt="SLLC" />
                <span>SLLC</span>
            </a>

            <!-- Navbar toggler button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Employment link -->
                    <img src="nav_img/employment.png" alt="">
                    <li class="nav-item">
                        <a href="employment_detail.php" class="nav-link">EMPLOYMENT</a>
                    </li>

                    <!-- Apply list link -->
                    <img src="nav_img/list.png" alt="">
                    <li class="nav-item">
                        <a href="apply_list.php" class="nav-link">APPLY LIST</a>
                    </li>

                    <!-- Chat link -->
                    <img src="nav_img/chat.png" alt="">
                    <li class="nav-item">
                        <a href="employer_chat.php" class="nav-link">CHAT</a>
                    </li>

                    <!-- User link -->
                    <li class="user">
                        <a href="employer_user.php" class="nav-link"><img src="nav_img/user.png" alt="User"></a>
                    </li>

                    <!-- Logout link -->
                    <li class="logout">
                        <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="background-color">
        <form class="d-flex">
            <!-- Search form -->
            <input class="form-control me-2 custom-search-input" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="job-listings">
                        <?php
                        // Check if the user is logged in by checking if a specific cookie is set
                        if (isset($_COOKIE['loginUser'])) {
                            // Retrieve the employer ID from the cookie
                            $eId = $_COOKIE['loginUser'];

                            // Define the URL for the API endpoint
                            $url = 'http://3.212.61.233:3000/CompanyJob/';
                            // Data to be sent in the API request
                            $data = [
                                'eId' => $eId
                            ];

                            // cURL options for the API request
                            $options = [
                                CURLOPT_URL => $url,
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => json_encode($data),
                                CURLOPT_HTTPHEADER => [
                                    'Content-Type: application/json',
                                ],
                            ];

                            // Initialize cURL session
                            $curl = curl_init();
                            // Set cURL options
                            curl_setopt_array($curl, $options);
                            // Execute the cURL request and get the response
                            $response = curl_exec($curl);

                            // Check if there was an error during the cURL request
                            if ($response === false) {
                                // Display an alert if there was an error
                                echo '<script>alert(\"' . curl_error($curl) . '\");</script>';
                            } else {
                                // Decode the JSON response
                                $responseData = json_decode($response, true);

                                // Check if the API request was successful
                                if ($responseData['success']) {
                                    // Store the data from the API response
                                    $apiData = $responseData['data'];

                                    // Loop through each job data and display job cards
                                    $employmentDetails = array();
                                    foreach ($apiData as $job) {
                                        $employmentDetails[] = $job;
                                        $jId = $job['jId'];
                                        $jobTitle = $job['jobTitle'];
                                        $timestamp = $job['createAt'];
                                        $cardId = 'jobCard_' . $jId;
                                        $applyDetailsId = 'applyDetails_' . $jId;

                                        // Display job card
                                        echo '<div class="job-card" id="' . $cardId . '" onclick="showDetails(\'' . $applyDetailsId . '\')">';
                                        echo '<h2>' . $jobTitle . '</h2>';
                                        echo '<span class="job-card-date-time">' . date("Y-m-d ", strtotime($timestamp)) . '</span>';
                                        echo '</div>';
                                    }
                                } else {
                                    // Handle API request failure
                                    $errorMsg = $responseData['msg'];
                                    $errorCode = $responseData['code'];
                                }
                            }

                            // Close cURL session
                            curl_close($curl);
                        ?>
                    </div>
                </div>
                <div class="col-md-8">
                        <?php
                            // Loop through stored employment details
                            foreach ($employmentDetails as $employment) {
                                // Extract job ID and apply details ID
                                $jId = $employment['jId'];
                                $applyDetailsId = 'applyDetails_' . $jId;

                                // Define URL for the API endpoint to retrieve apply list
                                $url = 'http://3.212.61.233:3000/ApplyList/';
                                $data = [
                                    'jId' => $jId
                                ];

                                // cURL options for the API request to retrieve apply list
                                $options = [
                                    CURLOPT_URL => $url,
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_POST => true,
                                    CURLOPT_POSTFIELDS => json_encode($data),
                                    CURLOPT_HTTPHEADER => [
                                        'Content-Type: application/json',
                                    ],
                                ];

                                // Initialize cURL session
                                $curl = curl_init();
                                curl_setopt_array($curl, $options);
                                // Execute the cURL request and get the response
                                $response = curl_exec($curl);

                                // Check if there was an error during the cURL request
                                if ($response === false) {
                                    // Display an alert if there was an error
                                    echo '<script>alert(\"' . curl_error($curl) . '\");</script>';
                                } else {
                                    // Decode the JSON response
                                    $responseData = json_decode($response, true);

                                    // Check if the API request was successful
                                    if ($responseData['success']) {
                                        // Store the data from the API response
                                        $apiData = $responseData['data'];

                                        // Display apply details section
                                        echo '<div class="apply-details" id="' . $applyDetailsId . '">
                                        <h2><strong>' . $employment['jobTitle'] . ' apply list</strong></h2><br>';

                                        // Loop through apply list data and display each member
                                        foreach ($apiData as $row) {
                                            $mId = $row['mId'];
                                            $mName = $row['mName'];
                                            $applicationDate = $row['application_date'];

                                            echo '<h4>' . $mName . '
                                            <a class="btn btn-primary detail-button" href="employer_chat.php?fromApplyList=true">Chat</a></h4>';
                                            echo '<span class="apply-card-date-time">' . date("Y-m-d H:i", strtotime($applicationDate)) . '</span><br><br>';
                                        }

                                        echo '</div>'; // Close apply details div
                                    }
                                }
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

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
        <i class="bx bx-chevron-up"></i> <!-- Back to top button -->
        </button>
    </div> <!-- End of container -->

<!-- Script to confirm logout -->
<script>
    function confirmLogout() {
        // Display a confirmation dialog box and store the result
        var isConfirmed = confirm('Are you sure you want to logout?');

        // If user confirms logout
        if (isConfirmed) {
            // Redirect to home.php
            window.location.href = 'home.php';
        } else {
            // Otherwise, call phpversion() function (this may be a mistake, as it doesn't exist in this context)
            phpversion();
        }
    }

    // Function to show details
    function showDetails(jId) {
        // Hide all apply details elements
        var detailsElements = document.querySelectorAll('.apply-details');
        detailsElements.forEach(function(element) {
            element.style.display = 'none';
        });

        // Show the specific apply details element
        var detailsElement = document.getElementById(jId);
        detailsElement.style.display = 'block';
    }
</script>

<!-- External JavaScript files -->
<script src="aa.js"></script> <!-- Include aa.js -->
<script src="header.js"></script> <!-- Include header.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> <!-- Include Bootstrap bundle from CDN -->
</body>

</html>
