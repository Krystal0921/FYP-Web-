
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
            echo '<h4><img src="user_icon/' . $postTitle["mPhoto"] . '" alt="User Photo" class="post-user-icon">      ' . $postTitle["mName"] . '<button type="button" class="btn btn-danger delete float-end" onclick="confirmDelete()">Delete</button></h4>';
            echo '<h2>' . $postTitle["title"] . '</h2>';
            echo '<img src="data:image/png;base64,' . $postTitle["image"] . '" alt="Post Photo" class="content-photo">';
            echo '<p>' . $postTitle["content"] . '</p>';
            echo '<p class="card-date-time-forum">' . date("F j, Y, g:i a", strtotime($postTitle["createAt"])) . '</p>';
            // echo '</div>';
    
            echo '<div class="container mt-4">';
            echo '<h3>Comments</h3>';
            echo '<form method="POST" action="member_post_details.php?postId=' . $postId . '">';
            echo '<div class="input-group">';
            echo '<input class="form-control" id="cComment" name="cComment" rows="3" placeholder="Add a comment" required>';
            echo '<input type="hidden" name="postId" value="' . $postId . '">';
            echo '<div class="input-group-append">';
            echo '<button type="submit" class="btn btn-primary post">Submit</button>';
            echo '</div></div><br>';
            echo '</form>';

            // Fetch and display comments
            $endpoint = 'PostComment/';
            $data1 = [
                'postId' => $postId
            ];

            $comments = callAPI($endpoint, $data1);
            if (!empty($comments))


                foreach ($comments as $comment) {
                    $commentContent = $comment['commentContent'];
                    $createAt = $comment['createAt'];
                    $mName = $comment['mName'];
                    $mPhoto = $comment['mPhoto'];

                    echo '<div class="comment">';
                    echo '<p><img src="user_icon/' . $mPhoto . '" alt="User Photo"><strong> ' . $mName . '</strong></p>';
                    echo '<p>' . $commentContent . '</p>';
                    echo '<p class="card-date-time-forum">' . date("F j, Y, g:i a", strtotime($createAt)) . '</p>';
                    // echo '<div class="input-group">';
                    // echo '<input class="form-control" id="cComment" name="cComment" rows="3" placeholder="Add a comment" required>';
                    // echo '<input type="hidden" name="postId" value="' . $postId . '">';
                    // echo '<div class="input-group-append">';
                    // echo '<button type="submit" class="btn btn-primary">Submit</button>';
                    echo '</div>';
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
        // function login() {
        //     var accountNumber = "123456";

        //     var accountNumberElement = document.getElementById("accountNumber");
        //     accountNumberElement.textContent = accountNumber;

        //     var popover = new bootstrap.Popover(document.getElementById("loginButton"), {
        //         content: document.getElementById("popoverContent").innerHTML,
        //         html: true,
        //     });
        //     popover.show();
        // }

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
        // document.addEventListener('DOMContentLoaded', function() {
        //     var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        //     var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        //         var popover = new bootstrap.Popover(popoverTriggerEl, {
        //             trigger: 'manual', // Set trigger to 'manual'
        //             html: true
        //         });

        //         popoverTriggerEl.addEventListener('mouseenter', function() {
        //             popover.show();
        //         });

        // Comment out the line below if you want the popover to be hidden on mouseleave
        // popoverTriggerEl.addEventListener('mouseleave', function () { popover.hide(); });

        //         return popover;
        //     });
        // });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>