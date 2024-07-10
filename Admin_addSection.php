<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
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
        <div class="container-section">
            <form class="section-form" action="process_create_section.php" method="post" enctype="multipart/form-data">

                <!-- <div class="form-group">
                    <label for="lesson">Select Lesson:</label>
                    <select class="lesson-dropdown" id="lesson" name="lesson" required>
                        Populate this dropdown dynamically with your lessons
                        <option value="lesson1">Daily Communication</option>
                        <option value="lesson2">Workplace Communication</option>
                        <option value="lesson2">Travel Communication</option>
                    </select>
                </div> -->

                <div class="form-group">
                    <label for="sectionName">Section Name:</label>
                    <input type="text" class="form-control" id="sectionName" name="sectionName" required>
                </div>

                <div class="form-group">
                    <label for="numQuestions">Total Number of Questions:</label>
                    <input type="number" class="form-control" id="numQuestions" name="numQuestions" required>
                </div>

                <div id="questionsContainer"></div>
                <div class="btn-section">
                    <button type="submit" class="create-btn">Create Section</button>
                    <button type="reset" class="reset-btn">Reset</button>
                </div>
            </form>
        </div>

            <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
                <i class="bx bx-chevron-up"></i>
            </button>
    </div>

    <script src="aa.js"></script>
    <script src="msg.js"></script>
    <script src="header.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const numQuestionsInput = document.getElementById('numQuestions');
            const questionsContainer = document.getElementById('questionsContainer');

            numQuestionsInput.addEventListener('input', function() {
                const numQuestions = parseInt(numQuestionsInput.value);

                let html = '';

                for (let i = 1; i <= numQuestions; i++) {
                    html += `
                        <div class="question-group">
                            <h3>Question ${i} <button type="button" class="remove-question-btn" onclick="removeQuestion(this)">Remove</button></h3>
                            <div class="form-group">
                                <label for="questionName${i}">Question Name:</label>
                                <input type="text" class="form-control" id="questionName${i}" name="questionName[]" required>
                            </div>

                            <div class="form-group">
                                <label for="questionType${i}">Question Type:</label>
                                <select class="form-control" id="questionType${i}" name="questionType[]" required>
                                    <option value="text">Text Answer</option>
                                    <option value="mc">Multiple Choice</option>
                                    <!-- Add more question types as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="answers${i}">Answers (comma-separated for MC, or enter for text answer):</label>
                                <input type="text" class="form-control" id="answers${i}" name="answers[]">
                            </div>

                            <div class="form-group">
                                <label for="correctAnswer${i}">Correct Answer:</label>
                                <input type="text" class="form-control" id="correctAnswer${i}" name="correctAnswer[]" required>
                            </div>

                            <div class="form-group">
                            <label for="mediaSupport${i}" class="form-label" style="display: block;"><strong>Media Support (Image/Video):</strong></label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="mediaSupport${i}" name="mediaSupport[]" accept="image/*,video/*" style="display: none;" onchange="updateFileName(${i})">
                                <button type="button" class="btn btn-outline-secondary" id="addPhotoBtn onclick="chooseFile('mediaSupport${i}')">Choose File</button>
                                <span class="input-group-text" id="selectedFileName${i}">No file selected</span>
                            </div>
                        </div>
                    </div>
                    `;
                }

                questionsContainer.innerHTML = html;
            });
        });

        function chooseFile(inputId) {
            document.getElementById(inputId).click();
        }

        function updateFileName(index) {
            const fileInput = document.getElementById(`mediaSupport${index}`);
            const fileNameSpan = document.getElementById(`selectedFileName${index}`);

            const fileName = fileInput.value.split('\\').pop();

            if (fileName) {
                fileNameSpan.textContent = fileName;
            } else {
                fileNameSpan.textContent = 'No file selected';
            }
        }

        function removeQuestion(element) {
            const questionGroup = element.closest('.question-group');
            questionGroup.remove();
        }

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