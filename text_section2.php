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

    <div class="background-color">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <div id="progressContainer">
                        <div id="progressIndicator">1 / 10</div><br />
                        <div id="mediaContainer">
                        </div>
                    </div>
                    <div id="referenceContainer" class="mt-2"></div>
                    <div id="descriptionContainer" class="mt-2">
                    </div><br />
                    <button id="nextButton" class="btn btn-primary section mt-2 float-end">Next</button>
                    <button id="finishButton" class="btn btn-primary section mt-2 float-end" data-bs-toggle="modal" data-bs-target="#feedbackModal" style="display:none;">Finish</button>


                </div>
            </div>
        </div>

        <div class="modal fade modal-wide" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">Feedback</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="feedbackForm">
                            <div class="mb-3">
                                <label for="lessonContent" class="form-label">For each statement below, choose the option that best reflects your opinion for the system:</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="lessonContent" id="disagreeStrongly" value="1" required>
                                        <label class="form-check-label" for="disagreeStrongly">Totally Disagree</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="lessonContent" id="disagree" value="2">
                                        <label class="form-check-label" for="disagree">Disagree</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="lessonContent" id="neutral" value="3">
                                        <label class="form-check-label" for="neutral">Neutral</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="lessonContent" id="agree" value="4">
                                        <label class="form-check-label" for="agree">Agree</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="lessonContent" id="agreeStrongly" value="5">
                                        <label class="form-check-label" for="agreeStrongly">Totally Agree</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="suggestions" class="form-label">Please share any suggestions you have for the future development of the Sign Language Learning Community. (Optional)</label>
                                <textarea class="form-control" id="suggestions" rows="3"></textarea>
                            </div>

                            <button type="button" class="btn btn-primary" onclick="submitFeedback()">Submit Feedback</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
    </div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script>
        var mediaList = [{
                src: 'Number/1.mp4',
                description: 'English: One\nChinese: 一',
                tagText: 'Number',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Number/2.mp4',
                description: 'English: Two\nChinese: 二',
                tagText: 'Number',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Number/3.mp4',
                description: 'English: Three\nChinese: 三',
                tagText: 'Number',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Number/4.mp4',
                description: 'English: Four\nChinese: 四',
                tagText: 'Number',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Number/5.mp4',
                description: 'English: Five\nChinese: 五',
                tagText: 'Number',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Letter/a.mp4',
                description: 'English: A\nChinese: A',
                tagText: 'Letter',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Letter/b.mp4',
                description: 'English: B\nChinese: B',
                tagText: 'Letter',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Letter/c.mp4',
                description: 'English: C\nChinese: C',
                tagText: 'Letter',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Letter/d.mp4',
                description: 'English: D\nChinese: D',
                tagText: 'Letter',
                reference: 'The Hong Kong Society for the Deaf'
            },
            {
                src: 'Letter/e.mp4',
                description: 'English: E\nChinese: E',
                tagText: 'Letter',
                reference: 'The Hong Kong Society for the Deaf'
            }
        ];

        var currentIndex = 0;
        var mediaContainer = document.getElementById('mediaContainer');
        var descriptionContainer = document.getElementById('descriptionContainer');
        var nextButton = document.getElementById('nextButton');

        function displayMedia() {
            var currentMedia = mediaList[currentIndex];
            var description = currentMedia.description || '';

            var mediaContainer = document.getElementById('mediaContainer');
            var descriptionContainer = document.getElementById('descriptionContainer');

            mediaContainer.innerHTML = '';

            if (currentMedia.src.endsWith('.mp4')) {
                var videoContainer = document.createElement('div');
                videoContainer.classList.add('rounded-media', 'fade-in');
                var video = document.createElement('video');
                video.controls = true;
                video.style.maxWidth = '100%';
                var source = document.createElement('source');
                source.src = currentMedia.src;
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
                return `<div><strong>${parts[0]}</strong>: ${parts[1]}</div>`;
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

        nextButton.addEventListener('click', nextMedia);

        displayMedia();

        function submitFeedback() {
            var feedbackValue = document.querySelector('input[name="lessonContent"]:checked').value;
            var suggestionsValue = document.getElementById('suggestions').value;

            // Use feedbackValue and suggestionsValue as needed for submission
            // For now, you can log them to the console
            console.log('Feedback:', feedbackValue);
            console.log('Suggestions:', suggestionsValue);

            // Optionally, you can close the modal or perform other actions after submitting feedback
            $('#feedbackModal').modal('hide');
        }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>