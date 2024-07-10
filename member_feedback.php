<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['lessonId']) && isset($_GET['sectionId'])) {
        $lessonId = urldecode($_GET['lessonId']);
        $sectionId = urldecode($_GET['sectionId']);

        $q1 = isset($_POST['q1']) ? $_POST['q1'] : null;
        $q2 = isset($_POST['q2']) ? $_POST['q2'] : null;
        $q3 = isset($_POST['q3']) ? $_POST['q3'] : null;
        $q4 = isset($_POST['q4']) ? $_POST['q4'] : null;
        $q5 = isset($_POST['q5']) ? $_POST['q5'] : null;

        // Check if any mandatory question is not answered
        if ($q1 === null || $q2 === null || $q3 === null || $q4 === null || $q5 === null) {
            echo '<script>alert("Please answer all mandatory questions before submitting.");</script>';
        } else {
            $url = 'http://3.212.61.233:3000/Feedback/';

           // $endpoint = 'Feedback/';
            $data = [
                'lessonId' => $lessonId,
                'sectionId' => $sectionId,
                'q1' => $q1,
                'q2' => $q2,
                'q3' => $q3,
                'q4' => $q4,
                'q5' => $q5,
                'q6' => isset($_POST['q6']) ? $_POST['q6'] : null
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
                    echo '<script>alert("Thank you for your feedback!");</script>';
                    header("Location: member_lesson_section.php?lessonId=" . $lessonId);
                } else {
                    $errorMsg = $responseData['msg'];
                    $errorCode = $responseData['code'];
                    echo '<script>alert("' . $errorMsg . '");</script>';
                }
            }
            curl_close($curl);
        }
    }
}
?>

<?php


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_GET['lessonId']) && (isset($_GET['sectionId']))) {
//         $lessonId = urldecode($_GET['lessonId']);
//         $sectionId = urldecode($_GET['sectionId']);



//         $q1 = $_POST['q1'];
//         $q2 = $_POST['q2'];
//         $q3 = $_POST['q3'];
//         $q4 = $_POST['q4'];
//         $q5 = $_POST['q5'];
//         $q6 = $_POST['q6'];


//         //include 'callAPI.php';
//         $url = 'http://3.212.61.233:3000/Feedback/';
//         $endpoint = 'Feedback/';
//         $data = [
//             'lessonId' => $lessonId,
//             'sectionId' => $sectionId,
//             'q1' => $q1,
//             'q2' => $q2,
//             'q3' => $q3,
//             'q4' => $q4,
//             'q5' => $q5,
//             'q6' => $q6
//         ];


//         $options = [
//             CURLOPT_URL => $url,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_POST => true,
//             CURLOPT_POSTFIELDS => json_encode($data),
//             CURLOPT_HTTPHEADER => [
//                 'Content-Type: application/json',
//             ],
//         ];

//         $curl = curl_init();
//         curl_setopt_array($curl, $options);
//         $response = curl_exec($curl);

//         if ($response === false) {
//             echo '<script>alert("' . curl_error($curl) . '");</script>';
//         } else {
//             $responseData = json_decode($response, true);

//             if ($responseData['success']) {
//                 echo '<script>alert("Thank you for your feedback!");</script>';
//                 header("Location: member_lesson_section.php?lessonId=" . $lessonId);
//             } else {
//                 $errorMsg = $responseData['msg'];
//                 $errorCode = $responseData['code'];
//                 echo '<script>alert("' . $errorMsg . '");</script>';
//             }
//         }
//         curl_close($curl);
//     }
// }

?>

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


    <div class="background-color-feedback">
        <div class="container-feedback">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <?php
                    // require_once 'db_conn.php';

                    // if (isset($_GET['lessonId'])) {
                    //     $lessonId = urldecode($_GET['lessonId']);
                    // }
                    //
                    ?>
                    <h4><strong>Feedback</strong></h4>
                </div><br /><br /><br />
                <form id="feedbackForm" method="post">
                    <p>For each statement below, choose the option that best reflects your opinion for <strong>the
                            system:</strong></p>
                    <p style="font-size: 14px; color: #333;">(1: Totally Disagree, 2: Disagree, 3: Neutral, 4: Agree, 5:
                        Totally Agree)</p>
                    <table class="table">
                        <!-- <thead>
                            <tr>
                                <th>Statement</th>
                                <th>Rating</th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <tr>
                                <td style="width: 300px;">The lesson sections contain enough content.</td>
                                <td style="width: 150px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input visually-hidden" type="radio" name="q1" id="disagree1" value="1">
                                        <label class="form-check-label" for="disagree1">1</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q1" id="disagree2" value="2">
                                        <label class="form-check-label" for="disagree2">2</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q1" id="disagree3" value="3">
                                        <label class="form-check-label" for="disagree3">3</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q1" id="disagree4" value="4">
                                        <label class="form-check-label" for="disagree4">4</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q1" id="disagree5" value="5">
                                        <label class="form-check-label" for="disagree5">5</label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="width: 300px;">There are an adequate number of sections.</td>
                                <td style="width: 150px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input visually-hidden" type="radio" name="q2" id="disagree6" value="1">
                                        <label class="form-check-label" for="disagree6">1</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q2" id="disagree7" value="2">
                                        <label class="form-check-label" for="disagree7">2</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q2" id="disagree8" value="3">
                                        <label class="form-check-label" for="disagree8">3</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q2" id="disagree9" value="4">
                                        <label class="form-check-label" for="disagree9">4</label>

                                        <input class="form-check-input visually-hidden" type="radio" name="q2" id="disagree10" value="5">
                                        <label class="form-check-label" for="disagree10">5</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form id="feedbackForm" method="post">
                        <p>For each statement below, choose the option that best reflects your opinion for <strong>the
                                current section:</strong></p>
                        <p style="font-size: 14px; color: #333;">(1: Totally Disagree, 2: Disagree, 3: Neutral, 4:
                            Agree, 5: Totally Agree)</p>
                        <table class="table">
                            <!-- <thead>
                                <tr>
                                    <th>Statement</th>
                                    <th>Rating</th>
                                </tr>
                            </thead> -->
                            <tbody>
                                <tr>
                                    <td style="width: 300px;">The learning material meets my requirement.</td>
                                    <td style="width: 150px;">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input2 visually-hidden" type="radio" name="q3" id="disagree11" value="1">
                                            <label class="form-check-label2" for="disagree11">1</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q3" id="disagree12" value="2">
                                            <label class="form-check-label2" for="disagree12">2</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q3" id="disagree13" value="3">
                                            <label class="form-check-label2" for="disagree13">3</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q3" id="disagree14" value="4">
                                            <label class="form-check-label2" for="disagree14">4</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q3" id="disagree15" value="5">
                                            <label class="form-check-label2" for="disagree15">5</label>
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td style="width: 300px;">There are enough supporting media resources.</td>
                                    <td style="width: 150px;">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input2 visually-hidden" type="radio" name="q4" id="disagree16" value="1">
                                            <label class="form-check-label2 rating-label" for="disagree16">1</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q4" id="disagree17" value="2">
                                            <label class="form-check-label2" for="disagree17">2</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q4" id="disagree18" value="3">
                                            <label class="form-check-label2" for="disagree18">3</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q4" id="disagree19" value="4">
                                            <label class="form-check-label2" for="disagree19">4</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q4" id="disagree20" value="5">
                                            <label class="form-check-label2" for="disagree20">5</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 300px;">The explanation of learning material is clear.</td>
                                    <td style="width: 150px;">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input2 visually-hidden" type="radio" name="q5" id="disagree21" value="1">
                                            <label class="form-check-label2" for="disagree21">1</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q5" id="disagree22" value="2">
                                            <label class="form-check-label2" for="disagree22">2</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q5" id="disagree23" value="3">
                                            <label class="form-check-label2" for="disagree23">3</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q5" id="disagree24" value="4">
                                            <label class="form-check-label2" for="disagree24">4</label>

                                            <input class="form-check-input2 visually-hidden" type="radio" name="q5" id="disagree25" value="5">
                                            <label class="form-check-label2" for="disagree25">5</label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mb-3">
                            <label for="q6" class="form-label">Please share any suggestions you have for the
                                future development of the Sign Language Learning Community. (Optional)</label>
                            <textarea class="form-control" id="q6" name="q6" rows="5" style="height: 150px;"></textarea>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary feedback">Submit</button>
                            <!-- <button type="button" class="btn btn-primary feedback" onclick="submitFeedback(<?php echo isset($lessonId) ? "'" . $lessonId . "'" : 'null'; ?>) ">Submit</button> -->
                        </div>
                    </form>
                </form>
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
        function submitFeedback(lessonId) {
            // Check if all radio buttons are answered
            if (!validateFeedbackForm()) {
                alert('Please answer all questions before submitting.');
                return;
            }
            alert('Thank you for your feedback!');

            // Redirect to lesson_section.php with the current lessonId
            window.location.href = 'member_lesson_section.php?lessonId=' + lessonId;
        }

        function validateFeedbackForm() {
            var radioGroups = [
                'q1', 'q2', 'q3',
                'q4', 'q5'
            ];

            for (var i = 0; i < radioGroups.length; i++) {
                var groupName = radioGroups[i];
                var radioButtons = document.getElementsByName(groupName);

                var isAnswered = false;
                for (var j = 0; j < radioButtons.length; j++) {
                    if (radioButtons[j].checked) {
                        isAnswered = true;
                        break;
                    }
                }

                if (!isAnswered) {
                    return false; // At least one group is unanswered
                }
            }

            return true; // All groups are answered
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