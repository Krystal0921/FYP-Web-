<?php
require_once 'db_conn.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="member.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="#" class="navbar-brand">SIGN</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <img src="nav_img/lesson.png" alt="">
                    <li class="nav-item">
                        <a href="member_lesson.php" class="nav-link">LESSON</a>
                    </li>

                    <img src="nav_img/forum.png" alt="">
                    <li class="nav-item">
                        <a href="member_forum.php" class="nav-link">FORUM</a>
                    </li>

                    <img src="nav_img/chat.png" alt="">
                    <li class="nav-item">
                        <a href="member_chat.php" class="nav-link">CHAT</a>
                    </li>

                    <img src="nav_img/employment.png" alt="">
                    <li class="nav-item">
                        <a href="member_employment.php" class="nav-link">EMPLOYMENT</a>
                    </li>

                    <li class="user">
                        <a href="member_user.php" class="nav-link"><img src="nav_img/user.png" alt="User"></a>
                    </li>

                    <li class="logout">
                        <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="background-color">
        <form class="d-flex">
            <input class="form-control me-2 custom-search-input" type="search" placeholder="Search..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form><br>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="job-listings">
                        <?php
                        session_start();
                        $sql = "SELECT jId, jobTitle, description, highlights, responsibilities, requirements, jobOffer FROM employment";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $jId = $row['jId'];
                                $jobTitle = $row['jobTitle'];
                                $description = $row['description'];
                                $highlights = $row['highlights'];
                                $responsibilities = $row['responsibilities'];
                                $requirements = $row['requirements'];
                                $jobOffer = $row['jobOffer'];

                                $cardId = 'jobCard_' . $jId;
                                $jId = 'companyDetails_' . $jId;

                                echo '<div class="job-card" id="' . $cardId . '" onclick="showDetails(\'' . $jId . '\')">
                                    <h2>' . $jobTitle . '</h2>
                                    <p>' . $description . '</p>
                                </div>';
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <?php
                        // Reset result pointer
                        $result->data_seek(0);

                        while ($row = $result->fetch_assoc()) {
                            $jId = 'companyDetails_' . $row['jId'];

                            echo '<div class="company-details" id="' . $jId . '">
                                <p><strong>Description:</strong> ' . $row['description'] . '</p>
                                <p><strong>Highlights:</strong> ' . $row['highlights'] . '</p>
                                <p><strong>Responsibilities:</strong> ' . $row['responsibilities'] . '</p>
                                <p><strong>Requirements:</strong> ' . $row['requirements'] . '</p>
                                <p><strong>Job Offer:</strong> ' . $row['jobOffer'] . '</p>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-8">
                    <div id="companyDetails" class="company-details">
                    </div>
                </div> -->
    <footer class="p-4 border-top">
        <div class="container align-items-center justify-content-between">
            <h4>Connect</h4>
            <div class="p-4 social">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-linkedin'></i></a>

                <p class="p-4 mb-0 text-muted">
                    &copy; 2023 ......
                </p>
            </div>
        </div>

        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </footer>
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
        //     function showDetails(jId) {
        // var xmlhttp = new XMLHttpRequest();
        // var params = 'jId=' + encodeURIComponent(jId);
        // xmlhttp.onreadystatechange = function () {
        //     if (this.readyState == 4) {
        //         if (this.status == 200) {
        //             console.log(this.responseText); // Log the response
        //             // Parse the JSON response
        //             var details = JSON.parse(this.responseText);

        //             if (details.hasOwnProperty('error')) {
        //                 console.error('Error:', details.error);
        //             } else {
        //                 var companyDetails = "<h4>Job Highlights:</h4>";
        //                 companyDetails += "<p>" + details['highlights'] + "</p>";
        //                 companyDetails += "<h4>Responsibilities:</h4>";
        //                 companyDetails += "<p>" + details['responsibilities'] + "</p>";
        //                 companyDetails += "<h4>Requirements:</h4>";
        //                 companyDetails += "<p>" + details['requirements'] + "</p>";
        //                 companyDetails += "<h4>Job Offer:</h4>";
        //                 companyDetails += "<p>" + details['jobOffer'] + "</p>";

        //                 // Set the content to the companyDetails div
        //                 document.getElementById("companyDetails").innerHTML = companyDetails;
        //             }
        //         } else {
        //             console.error('Error:', this.status, this.statusText);
        //         }
        //     }
        // };

        //     // Replace 'your_php_file.php' with the actual PHP file handling the request
        //     var phpFile = 'get_job_details.php';
        //     var params = 'jId=' + jId;
        //     xmlhttp.open("GET", phpFile + "?" + params, true);
        //     xmlhttp.send();
        // }
    </script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>