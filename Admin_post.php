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
        <div class="container">
            <form action="write_article.php" method="post">
                <div class="mb-3">
                    <br><label for="title" class="form-label"><strong>Post Title :</strong>  </label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    <span id="titleCounter">(0/50)</span>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label" style="display: block;"><strong>Update Image :</strong><br>(optional)</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" style="display: none;">
                        <button type="button" class="btn btn-outline-secondary" id="addPhotoBtn">Choose Image</button>
                        <span class="input-group-text" id="selectedFileName">No Image selected</span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label"><strong>Post Content :</strong></label>
                    <textarea class="form-control" id="content" name="content" rows="12" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary article float-end">Submit Article</button>
            </form>

            <br><br><br><br>
        </div>

            <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
                <i class="bx bx-chevron-up"></i>
            </button>
    </div>

    <script src="aa.js"></script>
    <script src="msg.js"></script>
    <script src="header.js"></script>
    <script>
        var titleInput = document.getElementById('title');
        var titleCounter = document.getElementById('titleCounter');
        var selectedFileName = document.getElementById('selectedFileName');

        document.getElementById('title').addEventListener('input', function() {
            var wordCount = this.value.trim().split(/\s+/).length;
            var counter = document.getElementById('titleCounter');
            counter.textContent = '(' + wordCount + '/ 50)';

            if (wordCount > 50) {
                titleInput.setAttribute('readonly', 'true');
                titleCounter.textContent = '(50 words max)';
            } else {
                titleInput.removeAttribute('readonly');
            }
        });

        document.getElementById('addPhotoBtn').addEventListener('click', function () {
            document.getElementById('photo').click();
        });

        document.getElementById('photo').addEventListener('change', function () {
            var fileName = this.value.split('\\').pop();

            if (fileName) {
                selectedFileName.textContent = fileName;
            } else {
                selectedFileName.textContent = 'No file selected';
            }
        });

        function confirmLogout() {
            var isConfirmed = confirm('Are you sure you want to logout?');

            if (isConfirmed) {
                window.location.href = 'home.php';
            } else {
                phpversion();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>