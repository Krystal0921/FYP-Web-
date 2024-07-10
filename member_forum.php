<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>FYP</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="member.css">
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
                    <!-- Lesson link -->
                    <img src="nav_img/lesson.png" alt="">
                    <li class="nav-item">
                        <a href="member_lesson.php" class="nav-link">LESSON</a>
                    </li>
                    <!-- Forum link -->
                    <img src="nav_img/forum.png" alt="">
                    <li class="nav-item">
                        <a href="member_forum.php" class="nav-link">FORUM</a>
                    </li>
                    <!-- Chat link -->
                    <img src="nav_img/chat.png" alt="">
                    <li class="nav-item">
                        <a href="member_chat.php" class="nav-link">CHAT</a>
                    </li>
                    <!-- Employment link -->
                    <img src="nav_img/employment.png" alt="">
                    <li class="nav-item">
                        <a href="member_employment.php" class="nav-link">EMPLOYMENT</a>
                    </li>
                    <!-- User link -->
                    <li class="user">
                        <a href="member_user.php" class="nav-link"><img src="nav_img/user.png" alt="User"></a>
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
        <!-- Search form -->
        <form class="d-flex" method="GET" action="">
            <input class="form-control me-2 custom-search-input" type="search" placeholder="Search..." aria-label="Search" name="search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form><br>

        <div class="container">
            <?php
            // Include callAPI.php for API call
            include 'callAPI.php';

            // Define API endpoint and data
            $endpoint = 'Forum/';
            $data = [];

            // Call API to get forum posts data
            $apiData = callAPI($endpoint, $data);

            // Check if API call was successful
            if ($apiData > 0) {
                foreach ($apiData as $post) {
                    // Extract data for each post
                    $postId = $post['postId'];
                    $title = $post['title'];
                    $content = $post['content'];
                    $postImage = $post['postImage'];
                    $timestamp = $post['createAt'];
                    $image = $post['image'];


                    // Generate HTML for each post dynamically
                    echo '<div class="row">
                    <div class="col-lg-15 mb-2">
                    <a href="member_post_details.php?postId=' . $postId . '" class="card-forum shadow">
                            <div class="row no-gutters">
                                <div class="col-md-2">';
                        if ($image == null) {
                            echo '<img src="about_img/community1.png" alt="Post Photo" class="card-img">';
                        } else {
                            echo '<img src="data:image/png;base64,' . $image . '" alt="Post Photo" class="card-img">';
                        }
                        echo '</div>
                                <div class="col-md-10">
                                    <h5 class="card-title-forum">' . $title . '</h5>
                                    <p class="card-text-forum">' . $content . '</p>
                                    <span class="card-date-time">' . date("F j, Y, H:i", strtotime($timestamp . ' +8 hours')) . '</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>';
                }
            } else {
                // Output if no results found
                echo "0 results";
            }
            ?>
        </div>

        <div class="post-button-container">
            <!-- Button to navigate to write_article.php -->
            <button class="post-button" onclick="window.location.href = 'write_article.php'">+</button>
        </div>
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i> <!-- Button to scroll back to top -->
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
    </script>

    <!-- External JavaScript files -->
    <script src="aa.js"></script> <!-- Include aa.js -->
    <script src="msg.js"></script> <!-- Include msg.js -->
    <script src="header.js"></script> <!-- Include header.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> <!-- Include Bootstrap bundle from CDN -->
</body>

</html>