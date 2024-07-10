<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userName = $_POST['uName'];
    $password = $_POST['password'];

    $url = 'http://3.212.61.233:3000/login/';
    $data = [
        'username' => $userName,
        'password' => $password
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

        echo '<script>alert(\"' . curl_error($curl) . '\");</script>';

    } else {
        $responseData = json_decode($response, true);

        if ($responseData['success']) {

            $apiData = $responseData['data'][0];


            if ($responseData['data'] == "admin") {
                header("Location: Admin_home_permissionlist.php");
            }


            if (isset($apiData['mId'])) {
                setcookie('loginUser', $apiData['mId']);
                setcookie('name', $apiData['mName']);
                setcookie('photo', $apiData['mPhoto']);
                $userId = $apiData['mId'];
                header("Location: member_lesson.php");

            } elseif (isset($apiData['eId'])) {
                setcookie('loginUser', $apiData['eId']);
                setcookie('name', $apiData['eName']);
                setcookie('photo', $apiData['image']);
                $userId = $apiData['eId'];
                header("Location: employment_detail.php");
            }

            echo '<script>alert("Welcome !");</script>';
        } else {
            $errorMsg = $responseData['msg'];
            $errorCode = $responseData['code'];
            if ($errorCode == 1) {
                echo '<script>alert("' . $errorMsg . '");</script>';
            } else {
                echo '<script>alert("Invalid username or password. Please try again.");</script>';
            }
        }
    }

    curl_close($curl);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <a href="home.php" class="back-icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <h1>SLLC</h1>
            <form action="login.php" method="post">
                <input type="text" name="uName" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log in</button>
            </form>
            <a href="forgot.php" class="forgot">Forgot Password?</a>
        </div>
        <div class="signup">
            <a href="signup.php">Sign up</a>
        </div>
    </div>

</body>

</html>