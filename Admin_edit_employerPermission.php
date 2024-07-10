<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="background-color">
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
                            <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png"
                                    alt="logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset ($_POST['eId'])) {
                $eId = $_POST['eId'];
                $accessJob = isset ($_POST['access_job']) ? 1 : 0;

                $url = 'http://3.212.61.233:3000/ChangeEmployerActive/';
                $data = [
                    'eId' => $eId,
                    'active' => $accessJob
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
                } else {
                    $responseData = json_decode($response, true);

                    if ($responseData['success']) {
                        echo '<script>alert("Employer active status updated successfully.");</script>';
                        echo '<script>window.location.href = "Admin_edit_employerPermission.php?eId=' . $eId . '";</script>';
                        exit;
                    } else {
                        echo '<script>alert("Failed to update employer active status.");</script>';
                    }
                }

                curl_close($curl);
            }
        }

        ?>


        <div class="container-edit">
            <?php
            if (isset ($_GET['eId'])) {
                $eId = urldecode($_GET['eId']);

                include 'callAPI.php';

                $endpoint = 'EmployerDetail/';
                $data = [
                    'eId' => $eId
                ];
                $employer = callAPI($endpoint, $data);

                if (!empty ($employer)) {

                    echo '<form class="edit-form" action="Admin_edit_employerPermission.php" method="post">';
                    echo '<div class="member-details">';
                    echo '<img src="company_logo/' . $employer["cPhoto"] . '" alt="Employer Picture" class="member-pic">';
                    echo '<p>Employer ID: ' . $employer["eId"] . '</p>';
                    echo '<p>Username: ' . $employer["eName"] . '</p>';
                    echo '</div>';
                    echo '<div class="check-form">';
                    echo '<div class="form-check">';
                    // Set the checkbox value based on the active status
                    echo '<input type="checkbox" class="form-check-input" id="access_job" name="access_job" ' . ($employer['active'] == 1 ? 'checked' : '') . '>';
                    echo '<label class="form-check-label" for="access account">Access Account</label>';
                    echo '</div>';
                    echo '<input type="hidden" name="eId" value="' . $employer["eId"] . '">';
                    echo '<button type="submit" class="save-btn">Save Changes</button>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    echo '<p>No data found for the specified Employer ID.</p>';
                }
            }
            ?>
        </div>
        <br><br><br>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>

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
    </div>

    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>