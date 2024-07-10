<!DOCTYPE html>
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
        <?php
    // post_details.php
    
    if (isset($_GET['postId'])) {
        $postId = urldecode($_GET['postId']);

        include 'callAPI.php';

        $endpoint = 'PostTitle/';
        $data = [
            'postId' => $postId
        ];
        $post = callAPI($endpoint, $data);


        // Display the details of the forum post along with user information
        if (!empty($post)) {
            $postTitle = $post[0];
            echo '<div class="container"><br>';
            echo '<h4><img src="user_icon/' . $postTitle["mPhoto"] . '" alt="User Photo" class="post-user-icon">      ' . $postTitle["mName"] . '</h4>';
            echo '<h2>' . $postTitle["title"] . '</h2>';
            if ($postTitle["image"] == null) {
                echo '<img src="about_img/community1.png" alt="Post Photo" class="card-img">';
                } else {
                    echo '<img src="data:image/png;base64,' . $postTitle["image"] . '" alt="Post Photo" class="content-photo">';
                }
                // echo '</div>';

            // echo '<img src="data:image/png;base64,' . $postTitle["image"] . '" alt="Post Photo" class="content-photo">';
            echo '<p class="card-date-content">' . $postTitle["content"] . '</p>';
            echo '<p class="card-date-time-forum">' . date("F j, Y, g:i a", strtotime($postTitle["createAt"] . ' +8 hours')) . '</p>';
            echo '</div>';
    
            echo '<div class="container mt-4">';
            echo '<h3>Comments</h3>';
            echo '<form method="POST" action="member_post_details.php?postId=' . $postId . '">';
            echo '</div><br>';
            echo '</form>';

            // Fetch and display comments
            $endpoint = 'PostComment/';
            $data1 = [
                'postId' => $postId
            ];

            $comments = callAPI($endpoint, $data1);
            $comments = array_reverse($comments);
            
            if (!empty($comments))


                foreach ($comments as $comment) {
                    $commentContent = $comment['commentContent'];
                    $createAt = date('Y-m-d H:i:s', strtotime($comment['createAt'] . ' +8 hours'));
                    $mName = $comment['mName'];
                    $mPhoto = $comment['mPhoto'];

                    echo '<div class="comment">';
                    echo '<p><img src="user_icon/' . $mPhoto . '" alt="User Photo"><strong> ' . $mName . '</strong></p>';
                    echo '<p>' . $commentContent . '</p>';
                    echo '<p class="card-date-time-forum">' . date("F j, Y, H:i", strtotime($createAt)) . '</p>';
                    echo '</div>';
                    echo '<hr>';
                }
            echo '</div></div>';


        } else {
            echo 'Post not found';
        }


    } else {
        echo 'Post ID not provided';
    }
    ?>
    <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
        <i class="bx bx-chevron-up"></i>
    </button>
    </div>
    <!--link to js-->
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