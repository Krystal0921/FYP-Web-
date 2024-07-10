<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['role'] == 'member') {

        $uName = $_POST['uName'];
        $password = $_POST['password'];
        $mName = $_POST['mName'];
        $mContact = $_POST['mContact'];
        $mEmail = $_POST['mEmail'];
        $mType = $_POST['mCategory'];
        $mPhoto = "default-profile-picture.jpg";


        $url = 'http://3.212.61.233:3000/MemberRegister/';
        $data = [
            'uName' => $uName,
            'password' => $password,
            'mName' => $mName,
            'mContact' => $mContact,
            'mEmail' => $mEmail,
            'mType' => $mType,
            'mPhoto' => $mPhoto
        ];

    } else if ($_POST['role'] == 'employer') {

        $target_dir = "./company_logo/";
        $target_file = $target_dir . basename($_FILES["cPhoto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["cPhoto"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Move the uploaded file to the target directory
        // if ($uploadOk == 1 && move_uploaded_file($_FILES["cPhoto"]["tmp_name"], $target_file)) {
        //     echo "File uploaded successfully.";
        // } else {
        //     echo "Error uploading file.";
        // }



        $uName = $_POST['uName'];
        $password = $_POST['password'];
        $eName = $_POST['eName'];
        $eEmail = $_POST['eEmail'];
        $cName = $_POST['cName'];
        $cContact = $_POST['cContact'];
        $cAddress = $_POST['cAddress'];
        $cNumber = $_POST['cNumber'];
        $cPhoto = $_FILES['cPhoto']['name'];
        $base64Image = base64_encode(file_get_contents($target_file));

        $url = 'http://3.212.61.233:3000/EmployerRegister/';
        $data = [
            'uName' => $uName,
            'password' => $password,
            'eName' => $eName,
            'eEmail' => $eEmail,
            'cName' => $cName,
            'cContact' => $cContact,
            'cAddress' => $cAddress,
            'cNumber' => $cNumber,
            'cPhoto' => $cPhoto,
            'image' => $base64Image
        ];

    }

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

        if ($responseData['success']) {
            $apiData = $responseData['data'];

            echo '<script>';
            echo 'alert("Welcome aboard! You have successfully signed up.");';
           // echo 'alert("Start exploring our platform now!");';
            echo '</script>';
            echo '<script>window.location.href = "login.php";</script>';
        } else {
            // API request failed
            $errorMsg = $responseData['msg'];
            $errorCode = $responseData['code'];
            echo '<script>alert("' . $errorMsg . '")</script>';
            echo '<script>window.location.href = "signup.php";</script>';
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
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>

</style>

<body>
    <div class="registration-container">
        <div class="registration-tabs">
            <button onclick="showForm('member-registration')">Member</button>
            <button onclick="showForm('employer-registration')">Employer</button>
        </div>

        <!-- Member Registration Form -->
        <div class="registration-form" id="member-registration">
            <a href="home.php" class="back-icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <h1>SLLC</h1>
            <form action="signup.php" method="POST" onsubmit="return checkPassword();">
                <input type="hidden" name="role" value="member">
                <label for="uName"></label>
                <input type="text" name="uName" id="uName" placeholder="Enter your user name" required>
                <label for="password"></label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
                <label for="pwd_confirm"></label>
                <input type="password" name="pwd_confirm" id="pwd_confirm" placeholder="Re-enter to confirm password"
                    required>
                <label for="mName"></label>
                <input type="text" name="mName" id="mName" placeholder="Name" required>
                <label for="mContact"></label>
                <input type="text" name="mContact" id="mContact" placeholder="Contact" required>
                <label for="mEmail"></label>
                <input type="text" name="mEmail" id="mEmail" placeholder="Email" required>
                <br>

                <!-- <label for="mType">Disable Person?</label>
                <div class="radio-container">
                    <input type="radio" id="mType" name="mType" value="yes" required onclick="showCategorySection()">
                    <label for="yes">Yes</label>
                    <input type="radio" id="mType" name="mType" value="no" required onclick="hideCategorySection()">
                    <label for="no">No</label>
                </div> -->

                <!-- Category section -->
                <div id="categorySection">
                    <label>(Optional) Please select the option that best describes your hearing and speech
                        abilities:</label><br>
                    <div class="radio-container">
                        <input type="radio" id="deaf" class="category-radio" name="mCategory" value="1">
                        <label for="deaf">Deaf or hardly of hearing</label>

                        <input type="radio" id="mute" name="mCategory" value="2">
                        <label for="mute">Mute or hardly of speaking</label>

                        <input type="radio" id="deaf_mute" name="mCategory" value="3">
                        <label for="deaf_mute">None of the above</label>
                    </div>
                </div><br>

                <div class="checkbox-container">
                    <input type="checkbox" name="checkbox" id="memberCheckbox" required>
                    <label for="memberCheckbox">Please tick to agree Terms and Conditions</label>

                </div>

                <!-- <button type="submit">Register</button> -->
                <div class="button-container">
                    <button type="reset" class="reset-btn">Reset</button>
                    <button type="submit">Register</button>
                    <!-- <button type="button" class="back-btn" onclick="location.href='home.php'">Back</button> -->
                </div>
                <div class="signup">
                    <p>Have an account already? <a href="login.php">Log in</a></p>
                </div>
            </form>
        </div>

        <!-- Employer Registration Form -->
        <div class="registration-form" id="employer-registration">
            <a href="home.php" class="back-icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <h1>SLLC</h1>
            <form action="signup.php" method="post" enctype="multipart/form-data" onsubmit="return checkPassword();">
                <input type="hidden" name="role" value="employer">
                <label for="uName"></label>
                <input type="text" name="uName" id="uName" placeholder="Enter your user name" required>
                <label for="password"></label>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
                <label for="pwd_confirm"></label>
                <input type="password" name="pwd_confirm" id="pwd_confirm" placeholder="Re-enter to confirm password"
                    required>
                <label for="eName"></label>
                <input type="text" name="eName" id="eName" placeholder="Name" required>
                <label for="eEmail"></label>
                <input type="text" name="eEmail" id="eEmail" placeholder="Email" required>
                <label for="cName"></label>
                <input type="text" name="cName" id="cName" placeholder="Company name" required>
                <label for="cContact"></label>
                <input type="text" name="cContact" id="cContact" placeholder="Company contact" required>
                <label for="cAddress"></label>
                <input type="text" name="cAddress" id="cAddress" placeholder="Company address" required>
                <label for="cNumber"></label>
                <input type="number" name="cNumber" id="cNumber" placeholder="Company register number" required>

                <!-- <div class="mb-3">
                    <label for="cPhoto" class="form-label" style="display: block;"><strong>Please upload your company logo:</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="cPhoto" id="cPhoto" accept="image/*" style="display: none;" required>
                        <button type="button" class="btn btn-outline-secondary" id="addPhotoBtn">Choose Image</button>
                        <span class="input-group-text" id="selectedFileName">No image selected</span>
                    </div>
                </div> -->

                <label for="cPhoto">Please upload your company logo:</label>
                <input type="file" name="cPhoto" id="cPhoto" accept="image/*" required>

                <div class="checkbox-container">
                    <input type="checkbox" name="checkbox" id="employerCheckbox" required>
                    <label for="employerCheckbox">Please tick to agree Terms and Conditions</label>
                </div>

                <!-- <button type="submit">Register</button> -->
                <div class="button-container">
                    <button type="reset" class="reset-btn">Reset</button>
                    <button type="submit">Register</button>
                    <!-- <button type="button" class="back-btn" onclick="location.href='home.php'">Back</button> -->
                </div>
                <div class="signup">
                    <p>Have an account already? <a href="login.php">Log in</a></p>
                </div>
            </form>
        </div>
    </div>


    <script>

        function checkPassword() {
            var password = document.getElementById("password").value;
            var passwordConfirm = document.getElementById("pwd_confirm").value;

            if (password !== passwordConfirm) {
                alert("Passwords do not match. Please re-enter your password correctly.");
                return false;
            }

            return true;
        }

        function showForm(formId) {
            const forms = document.getElementsByClassName('registration-form');
            for (let i = 0; i < forms.length; i++) {
                forms[i].style.display = 'none';
            }
            const form = document.getElementById(formId);
            form.style.display = 'block';
        }

        function showCategorySection() {
            document.getElementById('categorySection').style.display = 'block';
        }

        function hideCategorySection() {
            document.getElementById('categorySection').style.display = 'none';
        }

        function validateForm() {
            var role = document.querySelector('input[name="role"]:checked');
            var roleValue = role ? role.value : null;

            var password = document.getElementById("password").value;
            var passwordConfirm = document.getElementById("pwd_confirm").value;

            if (password !== passwordConfirm) {
                alert("Passwords do not match. Please confirm your password correctly.");
                return false;
            }

            if (roleValue === "member") {
                // Additional validation for member role if needed
            } else if (roleValue === "employer") {
                // Additional validation for employer role if needed
            }

            return true;
        }

        // var titleInput = document.getElementById('title');
        // var titleCounter = document.getElementById('titleCounter');
        // var selectedFileName = document.getElementById('selectedFileName');

        // document.getElementById('title').addEventListener('input', function() {
        //     var wordCount = this.value.trim().split(/\s+/).length;
        //     var counter = document.getElementById('titleCounter');
        //     counter.textContent = '(' + wordCount + '/ 50)';

        //     if (wordCount > 50) {
        //         titleInput.setAttribute('readonly', 'true');
        //         titleCounter.textContent = '(50 words max)';
        //     } else {
        //         titleInput.removeAttribute('readonly');
        //     }
        // });

        // document.getElementById('addPhotoBtn').addEventListener('click', function() {
        //     document.getElementById('photo').click();
        // });

        // document.getElementById('photo').addEventListener('change', function() {
        //     var fileName = this.value.split('\\').pop();

        //     if (fileName) {
        //         selectedFileName.textContent = fileName;
        //     } else {
        //         selectedFileName.textContent = 'No file selected';
        //     }
        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>