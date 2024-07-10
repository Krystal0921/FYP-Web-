<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="member.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

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
                        <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png"
                                alt="logout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="background-color">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <?php
                    if (isset ($_GET['sectionId']) && isset ($_GET['lessonId'])) {
                        $sectionId = urldecode($_GET['sectionId']);
                        $lessonId = urldecode($_GET['lessonId']);

                        $url = 'http://3.212.61.233:3000/Lesson/Section/Content/';
                        $data = [
                            'lessonId' => $lessonId,
                            'sectionId' => $sectionId
                        ];

                        $options = [
                            CURLOPT_URL => $url,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_POST => true,
                            CURLOPT_POSTFIELDS => json_encode($data),
                            CURLOPT_HTTPHEADER => [
                                'Content-Type: application/json',
                            ],
                        ];

                        $curl = curl_init();
                        curl_setopt_array($curl, $options);
                        $response = curl_exec($curl);

                        if ($response === false) {
                            echo '<script>alert("' . curl_error($curl) . '");</script>';
                        } else {
                            $responseData = json_decode($response, true);

                            if ($responseData['success']) {
                                $apiData = $responseData['data'];


                                $mediaList = [];
                                foreach ($apiData as $lessonContent) {
                                    $sectionTitle = $lessonContent['sectionTitle'];
                                    $mediaList[] = [
                                        'src' => $lessonContent['contentData'],
                                        'description' => $lessonContent['description'],
                                        'tagText' => $lessonContent['contentType'],
                                        'reference' => $lessonContent['reference']
                                    ];
                                }
                            } else {
                                $errorMsg = $responseData['msg'];
                                $errorCode = $responseData['code'];
                                echo '<script>alert("' . $errorMsg . '");</script>';
                            }
                        }
                        curl_close($curl);
                    }


                    if (isset ($_POST['finishButton'])) {

                        if (isset ($_COOKIE['loginUser'])) {
                            $mId = $_COOKIE['loginUser'];

                            $url = 'http://3.212.61.233:3000/UpdateLessonProgress/';
                            $data = [
                                'mId' => $mId,
                                'lessonId' => $lessonId,
                                'sectionId' => $sectionId
                            ];

                            $options = [
                                CURLOPT_URL => $url,
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_POST => true,
                                CURLOPT_POSTFIELDS => json_encode($data),
                                CURLOPT_HTTPHEADER => [
                                    'Content-Type: application/json',
                                ],
                            ];

                            $curl = curl_init();
                            curl_setopt_array($curl, $options);
                            $response = curl_exec($curl);

                            if ($response === false) {
                                echo '<script>alert("' . curl_error($curl) . '");</script>';
                            } else {
                                $responseData = json_decode($response, true);

                                if ($responseData['success']) {
                                    // API request was successful
                                    $apiData = $responseData['data'];
                                    echo '<script>alert("Congratulations");</script>';
                                    $location = "member_feedback.php?lessonId=" . $lessonId . "&sectionId=" . $sectionId;
                                    header("Location: " . $location);
                                } else {

                                    $errorMsg = $responseData['msg'];
                                    $errorCode = $responseData['code'];
                                    if ($errorCode == 1) {
                                        $location = "member_lesson_section.php?lessonId=" . $lessonId;
                                        header("Location: " . $location);
                                    }
                                }
                            }

                            curl_close($curl);
                        }
                    }

                    ?>

                    <h3><strong>
                            <?php echo $sectionTitle; ?>
                        </strong></h3>
                    <hr class="separator-line">
                    <div id="progressContainer">
                        <div id="progressIndicator">1 /
                            <?php echo count($mediaList); ?>
                        </div><br />

                        <div id="mediaContainer"></div>
                    </div>
                    <div id="referenceContainer" class="mt-2"></div>
                    <div id="descriptionContainer" class="mt-2"></div><br />
                    <button id="backButton" class="btn btn-primary back mt-2 float-start">Back</button>
                    <button id="nextButton" class="btn btn-primary section mt-2 float-end">Next</button>
                    <form
                        action="member_lesson_video.php?lessonId=<?php echo $lessonId; ?>&sectionId=<?php echo $sectionId; ?>"
                        method="POST">
                        <button id="finishButton" name="finishButton" class="btn btn-primary section mt-2 float-end"
                            style="display:none;">Finish</button>
                    </form>
                </div>
            </div>
        </div>
        <br />
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>

    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script>
        var finishButton = document.getElementById('finishButton');
        var mediaList = <?php echo json_encode($mediaList); ?>;
        var currentIndex = 0;
        var mediaContainer = document.getElementById('mediaContainer');
        var descriptionContainer = document.getElementById('descriptionContainer');
        var nextButton = document.getElementById('nextButton');
        var backbutton = document.getElementById('backButton');

        function displayMedia() {
            var currentMedia = mediaList[currentIndex];
            var description = currentMedia.description || '';

            mediaContainer.innerHTML = '';

            if (currentMedia.src.endsWith('.mp4')) {
                var videoContainer = document.createElement('div');
                videoContainer.classList.add('rounded-media', 'fade-in');
                var video = document.createElement('video');
                video.controls = true;
                video.muted = true;
                video.style.maxWidth = '100%';
                var source = document.createElement('source');

                source.src = currentMedia.tagText + '/' + currentMedia.src;

                source.type = 'video/mp4';
                video.appendChild(source);
                videoContainer.appendChild(video);
                mediaContainer.appendChild(videoContainer);
            } else {
                var imgContainer = document.createElement('div');
                imgContainer.classList.add('rounded-media', 'fade-in');
                var img = document.createElement('img');
                img.src = currentMedia.src;
                img.alt = 'Media ' + (currentIndex + 1);
                img.style.maxWidth = '100%';
                img.style.width = '300px';
                imgContainer.appendChild(img);
                mediaContainer.appendChild(imgContainer);
            }



            setTimeout(function () {
                mediaContainer.querySelector('.fade-in').classList.add('active');
            }, 10);

            var descriptionHTML = description.split('\n').map(line => {
                var parts = line.split(':');
                return `<div><strong>English: </strong>${parts[0]}</div>`;
                // `<div><strong>Chinese: </strong></div>`;
            }).join('');


            descriptionHTML += `<div class="tag-icon"><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;${currentMedia.tagText}</div>`;
            descriptionContainer.innerHTML = descriptionHTML;
            referenceContainer.innerHTML = `<div class="reference-line">Reference: ${currentMedia.reference}</div>`;

            progressIndicator.textContent = `${currentIndex + 1}/${mediaList.length}`;

            if (currentIndex === mediaList.length - 1) {
                finishButton.style.display = 'block';
                nextButton.style.display = 'none';
            } else {
                finishButton.style.display = 'none';
                nextButton.style.display = 'block';
            }

        }

        function nextMedia() {
            currentIndex = (currentIndex + 1) % mediaList.length;
            displayMedia();
        }

        // function previousMedia() {
        //     if (currentIndex > 0) {
        //         currentIndex = (currentIndex - 1) % mediaList.length;
        //         displayMedia();
        //     } else if (currentIndex == 0) {
        //         alert("This is the first video. No previous video before this.");
        //     }

        // }

        function previousMedia() {
            if (currentIndex > 0) {
                currentIndex = (currentIndex - 1) % mediaList.length;
                displayMedia();
            } else if (currentIndex === 0) {
                var location = "member_lesson_section.php?lessonId=" + <?php echo json_encode($lessonId); ?>;
                window.location.href = location;
            }
        }

        backbutton.addEventListener('click', previousMedia)
        nextButton.addEventListener('click', nextMedia);

        displayMedia();
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>