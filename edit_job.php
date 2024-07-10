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
    label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

/* Input fields */
input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
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
        
    <form action="edit_job.php" method="POST">
        <?php
        $jobId = $_GET['jId']; // Assuming you get the job ID from the URL
        $apiUrl = "http://3.212.61.233:3000/JobDetail";
        $postData = ['jId' => $jobId]; // Data to send to the API

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json']
        ]);

        $response = curl_exec($curl);
        $responseData = json_decode($response, true);

        if ($responseData && $responseData['success']) {
            $jobData = $responseData['data'][0]; // Assuming there's only one job detail returned

            // Displaying job details in input fields
            echo '<label for="jobTitle">Job Title:</label>';
            echo '<input type="text" class="form-control" id="jobTitle" name="jobTitle" value="' . $jobData['jobTitle'] . '"><br>';

            echo '<label for="location">Location:</label>';
            echo '<input type="text" id="location" name="location" value="' . $jobData['location'] . '"><br>';

            echo '<label for="description">Description:</label>';
            echo '<textarea id="description" name="description">' . $jobData['description'] . '</textarea><br>';

            echo '<label for="highlights">Highlights:</label>';
            echo '<textarea id="highlights" name="highlights">' . $jobData['highlights'] . '</textarea><br>';

            echo '<label for="responsibilities">Responsibilities:</label>';
            echo '<textarea id="responsibilities" name="responsibilities">' . $jobData['responsibilities'] . '</textarea><br>';

            echo '<label for="requirements">Requirements:</label>';
            echo '<textarea id="requirements" name="requirements">' . $jobData['requirements'] . '</textarea><br>';

            // Add more fields as needed

            echo '<input type="hidden" name="jobId" value="' . $jobId . '">'; // To send jobId back to server for editing
            echo '<button type="submit" name="submit" class="btn btn-primary article float-end">Save</button>';
        } else {
            echo 'Failed to fetch job data.';
        }

        curl_close($curl);
        ?>
    </form>
    <!-- <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button> -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>