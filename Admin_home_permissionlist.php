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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- Navigation bar -->
    <div class="background-color">
        <!-- Header containing navigation links -->
        <header class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <!-- Logo and brand name -->
                <a href="home.php" class="navbar-brand">
                    <img class="navbar-brand" src="nav_img/logo.png" alt="SLLC" />
                    <span>SLLC</span>
                </a>
                <!-- Navigation toggle button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
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
                            <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Main content container -->
        <div class="container">
            <!-- Search form -->
            <form class="d-flex">
                <!-- Search input box -->
                <input id="search-box" class="form-control me-2 custom-search-input" type="search" placeholder="Search..." aria-label="Search">
                <!-- Search button -->
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form><br>
            <!-- Member section -->
            <h4><strong>Member</strong></h4>
            <!-- Container for member administration -->
            <div class="member-admin">
                <!-- Table to display member information -->
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <!-- Table header -->
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Post Permission</th>
                            <th>Comment Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Table body to hold member data -->
                    <tbody>
                        <?php
                        // PHP code to retrieve and display member data from API
                        include 'callAPI.php';
                        $endpoint = 'MemberInformation/';
                        $data = [];
                        $apiData = callAPI($endpoint, $data);
                        foreach ($apiData as $user) {
                            // Output each member's data as table rows
                            echo "<tr>";
                            echo "<td></td>";
                            echo '<td>' . $user["mId"] . '</td>';
                            echo '<td>' . $user["mName"] . '</td>';
                            echo "<td><input type='checkbox' disabled " . ($user['createPost'] == 1 ? 'checked' : '') . "></td>";
                            echo "<td><input type='checkbox' disabled " . ($user['createComment'] == 1 ? 'checked' : '') . "></td>";
                            echo '<td><a class="edit-btn" href="Admin_editPermission.php?mId=' . $user["mId"] . '">Edit</a></td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <br>
            <!-- Employer section -->
            <h4><strong>Employer</strong></h4>
            <!-- Container for employer administration -->
            <div class="employer-admin">
                <!-- Table to display employer information -->
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <!-- Table header -->
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Access Account</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Table body to hold employer data -->
                    <tbody>
                        <?php
                        // PHP code to retrieve and display employer data from API
                        $endpoint = 'EmployerInformation/';
                        $data = [];
                        $apiData = callAPI($endpoint, $data);
                        foreach ($apiData as $employer) {
                            // Output each employer's data as table rows
                            echo "<tr>";
                            echo "<td></td>";
                            echo '<td>' . $employer["eId"] . '</td>';
                            echo '<td>' . $employer["eName"] . '</td>';
                            echo "<td><input type='checkbox' disabled " . ($employer['active'] == 1 ? 'checked' : '') . "></td>";
                            echo '<td><a class="edit-btn" href="Admin_edit_employerPermission.php?eId=' . $employer["eId"] . '">Edit</a></td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div><br>
        </div>
        <!-- Back to top button -->
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!-- JavaScript code for searching and logout confirmation -->
    <script>
        // Search functionality
        document.getElementById('search-box').addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let memberRows = document.querySelectorAll('.member-admin tbody tr');
            let employerRows = document.querySelectorAll('.employer-admin tbody tr');
            // Filter Member Table
            memberRows.forEach(row => {
                let username = row.cells[2].textContent.toLowerCase();
                let memberId = row.cells[1].textContent.toLowerCase();
                if (username.includes(searchValue) || memberId.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            // Filter Employer Table
            employerRows.forEach(row => {
                let username = row.cells[2].textContent.toLowerCase();
                let employerId = row.cells[1].textContent.toLowerCase();
                if (username.includes(searchValue) || employerId.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

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
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
