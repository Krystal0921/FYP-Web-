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
                            <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    <div class="background-color">
        <form class="d-flex" method="GET" action="">
            <input class="form-control me-2 custom-search-input" type="search" placeholder="Search..." aria-label="Search" name="search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form><br>

        <div class="container">

        <?php
            // Check if the search form is submitted
            if (isset($_GET['search'])) {
                $search = $conn->real_escape_string($_GET['search']);

                // Fetch forum posts from the database based on the search input
                $sql = "SELECT postId, title, content, createAt FROM forum
                WHERE title LIKE '%$search%' OR content LIKE '%$search%'
                ORDER BY createAt DESC";
            } else {
                // Fetch all forum posts from the database if no search is performed
                $sql = "SELECT postId, title, content, createAt, postImage FROM forum ORDER BY createAt DESC";
            }

            // $result = $conn->query($sql);
            
            include 'callAPI.php';

            $endpoint = 'Forum/';
            $data = [
            ];

            $apiData = callAPI($endpoint, $data);

            if ($apiData > 0) {
                foreach ($apiData as $post) {
                    // Output data of each row
                    $postId = $post['postId'];
                    $title = $post['title'];
                    $content = $post['content'];
                    $postImage = $post['postImage'];
                    $timestamp = $post['createAt'];
                    $image = $post['image'];

                    // Generate HTML for each card dynamically
                    echo '<div class="row">
                        <div class="col-lg-15 mb-2">
                        <a href="Admin_post_details.php?postId=' . $postId . '" class="card-forum shadow">
                                <div class="row no-gutters">
                                    <div class="col-md-2">
                                    <img src="data:image/png;base64,' . $image . '" alt="Post Photo" class="card-img">
                                    </div>
                                    <div class="col-md-10">
                                        <h5 class="card-title-forum">' . $title . '</h5>
                                        <p class="card-text-forum">' . $content . '</p>
                                        <span class="card-date-time">' . date("F j, Y, g:i a", strtotime($timestamp)) . '</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>';

                }

            } else {
                echo "0 results";
            }

            ?>
        </div>

        <div class="post-button-container">
            <button class="post-button" onclick="window.location.href = 'Admin_post.php'">+</button>
        </div>
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="msg.js"></script>
    <script src="header.js"></script>

    <script>
        function login() {
            var accountNumber = "123456";

            var accountNumberElement = document.getElementById("accountNumber");
            accountNumberElement.textContent = accountNumber;

            var popover = new bootstrap.Popover(document.getElementById("loginButton"), {
                content: document.getElementById("popoverContent").innerHTML,
                html: true,
            });
            popover.show();
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

    <script>
        // Initialize Bootstrap Popover
        document.addEventListener('DOMContentLoaded', function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                var popover = new bootstrap.Popover(popoverTriggerEl, {
                    trigger: 'manual', // Set trigger to 'manual'
                    html: true
                });

                popoverTriggerEl.addEventListener('mouseenter', function() {
                    popover.show();
                });

                // Comment out the line below if you want the popover to be hidden on mouseleave
                // popoverTriggerEl.addEventListener('mouseleave', function () { popover.hide(); });

                return popover;
            });
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>