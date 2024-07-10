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

<style>
    .result-message {
        padding: 10px;
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
        opacity: 0;
        /* Initially hide the result messages */
        animation: fadeIn 0.5s ease-in-out forwards;
        /* Apply fade-in animation */
    }

    .result-correct {
        background-color: #a1eaae;
        color: #006400;
        width: 500px;
        height: 400px;
        border-radius: 10px;
    }

    .result-incorrect {
        background-color: #ffb5b5;
        color: #8b0000;
        width: 500px;
        height: 400px;
        border-radius: 10px;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .result-correct,
    .result-incorrect {
        background-size: cover;
    }
</style>


<?php

$prediction = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["photo-upload"]) && isset($_POST["answer"])) {
        $answer = $_POST["answer"];




        $target_dir = "./about_img/";
        $target_file = $target_dir . basename($_FILES["photo-upload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["photo-upload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if ($uploadOk == 1 && move_uploaded_file($_FILES["photo-upload"]["tmp_name"], $target_file)) {
        } else {
        }


        $image = base64_encode(file_get_contents($target_file));

        $url = 'http://3.212.61.233:3000/AIQuiz/';

        $data = [
            'image_data' => $image,

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
            echo curl_error($curl);
        } else {
            $responseData = json_decode($response, true);

            if (!isset($responseData['error'])) {
                $prediction = $responseData['prediction'];
            }
        }
        curl_close($curl);
    }
}

?>

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


    <div class="ai-body">
        <div class="ai-container">
            <form action="member_section_ai.php" method="POST" enctype="multipart/form-data">
                <h2><strong>AI Quiz</strong></h2>
                <?php if ($prediction !== "" && isset($answer)) : ?>
                    <?php if ($prediction == $answer) : ?>

                        <div class="image-container">
                            <div class="result-message result-correct" style="color: green; font-weight: bold; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <div style="font-size: 24px;">Correct</div>
                                <br />
                                <span style="font-size: 150px;">&#9989;</span>
                                <br />
                                <div style="display: flex; justify-content: space-between;">
                                    <a href="member_section_ai.php" class="btn btn-primary ai" style="margin-right: 10px;">Try
                                        again</a>
                                    <a href="member_lesson.php" class="btn btn-primary ai">Back to Lesson</a>
                                </div>
                            </div>
                        </div>


                    <?php else : ?>
                        <div class="image-container">
                            <div class="result-message result-incorrect" style="color: red; font-weight: bold; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <div style="font-size: 24px;">Incorrect</div>
                                <br />
                                <span style='font-size:100px;'>&#10060;</span>
                                <br />
                                <div style="display: flex; justify-content: space-between;">
                                    <a href="member_section_ai.php" class="btn btn-primary ai" style="margin-right: 10px;">Try
                                        again</a>
                                    <a href="member_lesson.php" class="btn btn-primary ai">Back to Lesson</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php else : ?>
                    <div id="question-text"></div>
                    <input type="hidden" id="answer" name="answer" value="">
                    <div class="image-container">
                        <img src="#" alt="Quiz Image" id="submitted-image" style="display: none; width: 300px; height: 200px;">
                    </div>

                    <input type="file" accept="image/*" id="photo-upload" name="photo-upload">
                    <label for="photo-upload" class="photo-upload">Upload Your Answer</label><br />
                    <button id="submit-btn" class="btn btn-primary ai" onclick="checkAnswer()">Confirm</button>
                <?php endif; ?>

            </form>
        </div>
    </div>
    <!-- 
    <div class="ai-body">
        <div class="ai-container">
            <form action="member_section_ai.php" method="POST" enctype="multipart/form-data">
                <h2><strong>AI Quiz</strong></h2>

                <div id="question-text"></div>
                <input type="hidden" id="answer" name="answer" value="">
                <div class="image-container">
                    <img src="#" alt="Quiz Image" id="submitted-image"
                        style="display: none; width: 300px; height: 200px;">
                </div>

                <input type="file" accept="image/*" id="photo-upload" name="photo-upload">
                <label for="photo-upload" class="photo-upload">Upload Your Answer</label><br />
                <button id="submit-btn" class="btn btn-primary ai">Confirm</button>
            </form>
        </div>
    </div> -->

    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script>
        const questions = [
            ["What is 'A' in sign language?", "A"],
            ["What is 'B' in sign language?", "B"],
            ["What is 'C' in sign language?", "C"],
            ["What is 'D' in sign language?", "D"],
            ["What is 'E' in sign language?", "E"],
            ["What is '7' in sign language?", "7"],
            ["What is '8' in sign language?", "8"],
            ["What is '9' in sign language?", "9"],
            ["What is '10' in sign language?", "10"],
        ];

        const getRandomQuestion = () => {
            const randomIndex = Math.floor(Math.random() * questions.length);
            return questions[randomIndex];
        };

        const displayQuestion = () => {
            const [question, answer] = getRandomQuestion();
            document.getElementById("question-text").textContent = question;
            document.getElementById("answer").value = answer;
        };

        // Display initial question
        displayQuestion();

        // JavaScript function to handle file upload and display the submitted image
        document.getElementById('photo-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const image = document.getElementById('submitted-image');
                image.src = e.target.result;
                image.style.display = 'block';
            }

            reader.readAsDataURL(file);
        });

        function checkAnswer() {

            // const userAnswer = document.getElementById("answer").value;
            // if (userAnswer === correctAnswer) {

            // alert("You are correct!");
            // } else {
            //     alert("You are incorrect!");
            // }

            var isCorrect = alert("Incorrect answer, please try again!!")

            if (isCorrect) {
                window.location.href = 'section_ai.php';
            }
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