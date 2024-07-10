<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
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
        <div class="container mt-5">
            <?php
            if (isset($_COOKIE['loginUser']) && isset($_GET['postId']) && !empty($_GET['postId'])) {
                $mId = $_COOKIE['loginUser'];
                $postId = urldecode($_GET['postId']);

                include 'callAPI.php';

                $endpoint = 'PostTitle/';
                $data = [
                    'mId' => $mId,
                    'postId' => $postId
                ];
                $post = callAPI($endpoint, $data);

                if (!empty($post)) {
                    $postTitle = $post[0];
                    ?>
                    <form action="edit_post.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $postTitle['title'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="content">Post Content:</label>
                            <textarea class="form-control" id="content" name="content" rows="5" style="height: 150px;"><?= $postTitle['content'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Post Image:</label><br />
                            <img id="previewImage" src="data:image/png;base64,<?= $postTitle['image'] ?>" alt=" " class="img-thumbnail" style="max-width: 200px;"><br />
                            <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="previewFile()">
                            <button type="button" class="btn btn-danger article my-3" onclick="deleteImage()">Delete Image</button>
                            <button type="submit" name="submit" class="btn btn-primary article float-end">Save</button>
                        </div>
                        <input type="hidden" name="postId" value="<?= $postId ?>">
                    </form>
                    <?php
                } else {
                    echo 'Post not found';
                }
            } else {
                echo 'Post ID not provided';
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                $mId = $_COOKIE['loginUser'];
                $postId = $_POST['postId'];
                $newContent = $_POST['content'];

                if ($_FILES['image']['name']) {
                    $newImage = $_FILES['image']['name'];
                    $tempImage = $_FILES['image']['tmp_name'];
                    $target = "forum_img/" . basename($newImage);
                    move_uploaded_file($tempImage, $target);
                } else {
                    $newImage = "";
                }

                $editPostApiUrl = "http://3.212.61.233:3000/EditPost";
                $postData = [
                    'postId' => $postId,
                    'content' => $newContent,
                    'mId' => $mId,
                    'image' => $newImage
                ];

                $curl = curl_init($editPostApiUrl);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($curl);

                var_dump($response); // This will print the response for debugging


                if ($response === false) {
                    echo "Error updating post: " . curl_error($curl);
                } else {
                    $responseData = json_decode($response, true);
                    if (isset($responseData['success']) && $responseData['success']) {
                        header("Location: member_forum.php");
                        exit;
                    } elseif (isset($responseData['message'])) {
                        echo "Error updating post: " . $responseData['message'];
                    } else {
                        echo "Error updating post: Unknown error occurred";
                    }
                }

                curl_close($curl);
            }
            ?>
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
        function confirmLogout() {
            var isConfirmed = confirm('Are you sure you want to logout?');
            if (isConfirmed) {
                window.location.href = 'home.php';
            } else {
                phpversion();
            }
        }

        function deleteImage() {
            var isConfirmed = confirm('Are you sure you want to delete the image?');
            if (isConfirmed) {
                document.getElementById('previewImage').src = "";
                document.getElementById('image').value = "";
            }
        }

        function previewFile() {
            var preview = document.getElementById('previewImage');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
