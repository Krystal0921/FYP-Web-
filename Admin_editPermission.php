<!doctype html>
<html lang="en">

<head>
    <!-- Meta tags for character set, viewport, and title -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <!-- External CSS files -->
    <link rel="stylesheet" type="text/css" href="admin.css">
    <!-- External library for icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Main container with background color -->
    <div class="background-color">
        <!-- Navigation bar -->
        <header class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <!-- Logo and brand name -->
                <a href="home.php" class="navbar-brand">
                    <img class="navbar-brand" src="nav_img/logo.png" alt="SLLC" />
                    <span>SLLC</span>
                </a>
                <!-- Navigation toggle button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navigation links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- Home link -->
                        <img src="nav_img/home.png" alt="">
                        <li class="nav-item">
                            <a href="Admin_home_permissionlist.php" class="nav-link">HOME</a>
                        </li>
                        <!-- Forum link -->
                        <img src="nav_img/forum.png" alt="">
                        <li class="nav-item">
                            <a href="Admin_forum.php" class="nav-link">FORUM</a>
                        </li>
                        <!-- Lesson link -->
                        <img src="nav_img/lesson.png" alt="">
                        <li class="nav-item">
                            <a href="Admin_lesson.php" class="nav-link">LESSON</a>
                        </li>
                        <!-- Feedback records link -->
                        <img src="nav_img/feedback.png" alt="">
                        <li class="nav-item">
                            <a href="Admin_feedback_records.php" class="nav-link">FEEDBACK RECORDS</a>
                        </li>
                        <!-- Logout link -->
                        <li class="logout">
                            <!-- Logout button with confirmation -->
                            <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png"
                                    alt="logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- PHP code to handle form submission and update permissions -->
        <?php
        // Check if form submitted via POST method
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if 'mId' is set in the POST data
            if (isset($_POST['mId'])) {
                // Retrieve data from POST
                $mId = $_POST['mId'];
                // Check if 'post_permission' checkbox is checked
                $postPermission = isset($_POST['post_permission']) ? 1 : 0;
                // Check if 'comment_permission' checkbox is checked
                $commentPermission = isset($_POST['comment_permission']) ? 1 : 0;
                // API endpoint for updating post_permission
                $urlPost = 'http://3.212.61.233:3000/ChangeCreatePostActive/';
                // Data for post_permission update
                $postData = [
                    'mId' => $mId,
                    'active' => $postPermission
                ];
                // Options for cURL request
                $optionsPost = [
                    CURLOPT_URL => $urlPost,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode($postData),
                    CURLOPT_HTTPHEADER => [
                        'Content-Type: application/json',
                    ],
                ];
                // Initialize cURL session for post_permission update
                $curlPost = curl_init();
                curl_setopt_array($curlPost, $optionsPost);
                // Execute cURL request
                $responsePost = curl_exec($curlPost);
                // Check if cURL request was successful
                if ($responsePost === false) {
                    echo curl_error($curlPost);
                } else {
                    // Decode response JSON
                    $responseDataPost = json_decode($responsePost, true);
                    // Check if update successful
                    if (!$responseDataPost['success']) {
                        echo '<script>alert("Failed to update user Create Post active status.");</script>';
                    }
                }
                // Close cURL session for post_permission update
                curl_close($curlPost);

                // Similar process for comment_permission update...

                // Redirect back to edit page with success message
                echo '<script>alert("User active status updated successfully.");</script>';
                echo '<script>window.location.href = "Admin_editPermission.php?mId=' . $mId . '";</script>';
                exit;
            }
        }
        ?>

        <!-- Container for editing user permissions -->
        <div class="container-edit">
            <?php
            // Check if 'mId' is set in the GET data
            if (isset($_GET['mId'])) {
                // Retrieve 'mId' from GET data
                $mId = urldecode($_GET['mId']);
                // Include PHP script for API call
                include 'callAPI.php';
                // API endpoint for retrieving member details
                $endpoint = 'MemberDetail/';
                // Data for member details request
                $data = [
                    'mId' => $mId
                ];
                // API call to retrieve member details
                $apiData = callAPI($endpoint, $data);
                // Check if member details are found
                if (!empty($apiData)) {
                    // Retrieve member details
                    $member = $apiData[0];
                    // Display form for editing permissions
                    echo '<form class="edit-form" action="Admin_editPermission.php" method="post">';
                    echo '<div class="member-details">';
                    echo '<img src="user_icon/' . $member["mPhoto"] . '" alt="Member Picture" class="member-pic">';
                    echo '<p>Member ID: ' . $member["mId"] . '</p>';
                    echo '<p>Username: ' . $member["mName"] . '</p>';
                    echo '</div>';
                    echo '<div class="check-form">';
                    echo '<div class="form-check">';
                    // Checkbox for post permission
                    echo '<input type="checkbox" class="form-check-input" id="post_permission" name="post_permission" ' . ($member['createPost'] == 1 ? 'checked' : '') . '>';
                    echo '<label class="form-check-label" for="post_permission">Post Permission</label>';
                    echo '</div>';
                    echo '<div class="form-check">';
                    // Checkbox for comment permission
                    echo '<input type="checkbox" class="form-check-input" id="comment_permission" name="comment_permission" ' . ($member['createComment'] == 1 ? 'checked' : '') . '>';
                    echo '<label class="form-check-label" for="comment_permission">Comment Permission</label>';
                    echo '</div>';
                    // Hidden input field to pass 'mId'
                    echo '<input type="hidden" name="mId" value="' . $member["mId"] . '">';
                    // Submit button to save changes
                    echo '<button type="submit" class="save-btn">Save Changes</button>';
                    echo '</div>';
                    echo '</form>';
                } else {
                    // Display message if no member details found
                    echo '<p>No data found for the specified Member ID.</p>';
                }
            }
            ?>
        </div>
        <br><br><br>

        <!-- Button to scroll back to top -->
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>

    <!-- JavaScript code for logout confirmation -->
    <script>
        function confirmLogout() {
            // Confirm logout before proceeding
            var isConfirmed = confirm('Are you sure you want to logout?');
            if (isConfirmed) {
                // Redirect to home page if logout confirmed
                window.location.href = 'home.php';
            } else {
                // What's this line for? It seems unnecessary
                phpversion();
            }
        }
    </script>
    <!-- Additional scripts -->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
