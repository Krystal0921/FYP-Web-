<?php
if (isset($_COOKIE['loginUser'])) {
    $eId = $_COOKIE['loginUser'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jobTitle = $_POST['jobTitle'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $highlights = $_POST['highlights'];
        $responsibilities = $_POST['responsibilities'];
        $requirements = $_POST['requirements'];
        $currentDateTime = date('Y-m-d H:i:s');



        $url = 'http://3.212.61.233:3000/AddJob/';
        $data = [
            "eId" => $eId,
            "jobTitle" => $jobTitle,
            "location" => $location,
            "description" => $description,
            "highlights" => $highlights,
            "responsibilities" => $responsibilities,
            "requirements" => $requirements,
            "createAt" => $currentDateTime

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
            echo curl_error($curl);
            echo '<script>alert("' . curl_error($curl) . '");</script>';

        } else {
            $responseData = json_decode($response, true);

            if ($responseData['success']) {
                $apiData = $responseData['data'];

                echo '<script>alert("Add Job Success");</script>';
                echo '<script>window.location.href = "employment_detail.php";</script>';
            } else {
                // API request failed
                $errorMsg = $responseData['msg'];
                $errorCode = $responseData['code'];

                echo '<script>window.location.href = "add_job.php";</script>';
            }
        }
        curl_close($curl);
    }
}
?>

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
        <div class="container-job">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-job">
                        <h2>Create an employment post</h2>
                        <form method="post" action="">
                            <label for="jobTitle">Job Title:</label>
                            <input type="text" name="jobTitle" required>

                            <label for="location">Location:</label>
                            <input type="text" name="location" required>

                            <label for="description">Description:</label>
                            <textarea name="description" required></textarea>

                            <label for="highlights">Highlights:</label>
                            <textarea name="highlights" required></textarea>

                            <label for="responsibilities">Responsibilities:</label>
                            <textarea name="responsibilities" required></textarea>

                            <label for="requirements">Requirements:</label>
                            <textarea name="requirements" required></textarea>

                            <!-- <label for="jobOffer">Job Offer:</label>
                            <textarea name="jobOffer" required></textarea> -->

                            <button type="submit" class="btn btn-primary job float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>

    <script src="aa.js"></script>
    <script src="msg.js"></script>
    <script src="header.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>