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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <div class="background-color">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <?php
                    if (isset($_COOKIE['loginUser'])) {
                        $mId = $_COOKIE['loginUser'];
                        if (isset($_GET['lessonId'])) {
                            $lessonId = urldecode($_GET['lessonId']);

                            $url = 'http://3.212.61.233:3000/Lesson/Section/Quiz/';
                            $data = [
                                'mId' => $mId,
                                'lessonId' => $lessonId
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
                                    foreach ($apiData as $quiz) {
                                        $quizId = $quiz['quizId'];
                                        $question = $quiz['question'];
                                        $mediaList[] = [
                                            'optionAns1' => $quiz['optionAns1'],
                                            'optionAns2' => $quiz['optionAns2'],
                                            'optionAns3' => $quiz['optionAns3'],
                                            'optionAns4' => $quiz['optionAns4'],
                                            'correctAns' => $quiz['correctAns'],
                                            'src' => $quiz['contentData'],
                                            'tagText' => $quiz['sectionTitle']
                                        ];
                                    }
                                } else {
                                    $errorMsg = $responseData['msg'];
                                    $errorCode = $responseData['code'];
                                    echo '<script>alert("' . $errorMsg . '");</script>';
                                }
                            }
                        }
                        curl_close($curl);
                    }


                    ?>

<div class="modal fade" id="correctAnswerModal" tabindex="-1" aria-labelledby="correctAnswerModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="correctAnswerModalLabel">Corret</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="correctAnswerBody">
                                    <!-- Correct answer will be displayed here -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary section" data-bs-dismiss="modal">Got it</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="incorrectAnswerModal" tabindex="-1" aria-labelledby="correctAnswerModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="correctAnswerModalLabel">Incorrect</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="incorrectAnswerBody">
                                    <!-- Incorrect answer will be displayed here -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary section" data-bs-dismiss="modal">Got it</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quiz content -->
                    <div id="progressContainer">
                        <div id="progressIndicator">1 / <?php echo count($mediaList); ?></div><br />
                        <div id="mediaContainer"></div>
                    </div><br />
                    <h3><strong id="question"><?php echo $question; ?></strong></h3>
                    <div id="descriptionContainer" class="mt-2"></div><br />
                    <button id="nextButton" class="btn btn-primary section mt-2 float-end">Next</button>
                    <form action="section_quiz.php?lessonId=<?php echo $lessonId; ?>" method="POST">
                        <button id="finishButton" name="finishButton" class="btn btn-primary section mt-2 float-end" style="display:none;">Finish</button>
                        <input type="hidden" name="mark" id="markField" value="" />
                    </form>
                </div>
            </div>
        </div>
        <br />
        <button id="backToTopBtn" class="btn btn-dark
        rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        var finishButton = document.getElementById('finishButton');
        var mediaList = <?php echo json_encode($mediaList); ?>;
        var currentIndex = 0;
        var mediaContainer = document.getElementById('mediaContainer');
        var descriptionContainer = document.getElementById('descriptionContainer');
        var nextButton = document.getElementById('nextButton');
        var mark = 0;

        window.addEventListener('DOMContentLoaded', function() {
            mark = 0;
        });

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
                video.volume = 0;
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

            setTimeout(function() {
                mediaContainer.querySelector('.fade-in').classList.add('active');
            }, 10);

            var descriptionHTML = description.split('\n').map(line => {
                var parts = line.split(':');
                return `<div><strong>Select Answer </strong>${parts[0]}</div>
            <div class="quiz-line">Section : ${currentMedia.tagText}</div><br/>`;
                // `<div><strong>Chinese: </strong></div>`;
            }).join('');


            descriptionHTML += `<div class="options">
        <form>
            <label class="option-container">
                <input type="radio" name="answer" value="${currentMedia.optionAns1}" /> ${currentMedia.optionAns1}<br/>
            </label>
            <br>
            <label class="option-container">
                <input type="radio" name="answer" value="${currentMedia.optionAns2}" /> ${currentMedia.optionAns2}<br/>
            </label>
            <br>
            <label class="option-container">
                <input type="radio" name="answer" value="${currentMedia.optionAns3}" /> ${currentMedia.optionAns3}<br/>
            </label>
            <br>
            <label class="option-container">
                <input type="radio" name="answer" value="${currentMedia.optionAns4}" /> ${currentMedia.optionAns4}<br/>
            </label>
        </form>
        <span class="checkmark"></span>`;

            descriptionContainer.innerHTML = descriptionHTML;

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
            var anyOptionChecked = document.querySelector('input[name="answer"]:checked');
            if (!anyOptionChecked) {
                // If no option is selected, prevent proceeding to the next question
                alert('Please select an option before proceeding to the next question.');
                return;
            }
            var selectedValue = anyOptionChecked.value;
            var correctValue = mediaList[currentIndex].correctAns;
            checkAnswer(selectedValue, correctValue);
            currentIndex = (currentIndex + 1) % mediaList.length;
            displayMedia();
        }

        function previousMedia() {
            if (currentIndex > 0) {
                currentIndex = (currentIndex - 1) % mediaList.length;
                displayMedia();
            } else if (currentIndex === 0) {
                var location = "member_lesson_section.php";
                window.location.href = location;
            }
        }
        nextButton.addEventListener('click', nextMedia);
        displayMedia();

        function checkAnswer(selectedValue, correctValue) {
            if (selectedValue === correctValue) {
                var modalBody = document.getElementById('correctAnswerBody');
                modalBody.innerHTML = 'You are correct!';
                var correctAnswerModal = new bootstrap.Modal(document.getElementById('correctAnswerModal'));
                correctAnswerModal.show();
                mark++;
            } else {
                // Display modal with correct answer
                var modalBody = document.getElementById('incorrectAnswerBody');
                modalBody.innerHTML = 'Correct Answer: ' + correctValue;
                var incorrectAnswerModal = new bootstrap.Modal(document.getElementById('incorrectAnswerModal'));
                incorrectAnswerModal.show();
            }
            document.getElementById('markField').value = mark;
        }

        finishButton.addEventListener('click', function(event) {
            event.preventDefault();
            var location = "congratulations_animation2.php?lessonId=<?php echo $lessonId; ?>&score=" + mark;
            window.location.href = location;
        });
    </script>

</body>

</html>