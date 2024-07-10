<!DOCTYPE html>
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

                    <img src="nav_img/employment.png" alt="">
                    <li class="nav-item">
                        <a href="employment_detail.php" class="nav-link">EMPLOYMENT</a>
                    </li>

                    <img src="nav_img/list.png" alt="">
                    <li class="nav-item">
                        <a href="apply_list.php" class="nav-link">APPLY LIST</a>
                    </li>

                    <img src="nav_img/chat.png" alt="">
                    <li class="nav-item">
                        <a href="employer_chat.php" class="nav-link">CHAT</a>
                    </li>

                    <li class="user">
                        <a href="employer_user.php" class="nav-link"><img src="nav_img/user.png" alt="User"></a>
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
        <div class="wrapper">
            <!-- Users Section -->
            <section class="users">
                <header>
                    <div class="content">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <span>
                            <?php
                                if (isset($_COOKIE['loginUser'])) {
                                    $mId = $_COOKIE['loginUser'];
                                    $name = $_COOKIE['name'];

                                    echo htmlspecialchars($name);
                                } else {
                                    echo "Welcome, user!";
                                }
                                ?>
                            </span>
                            <p>Active now</p>
                        </div>
                    </div>
                </header>
                <div class="search">
                    <span class="text">Select a user to start chat</span>
                    <input type="text" placeholder="Enter name to search...">
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <div class="users-list">
                <?php
                    include 'callAPI.php';

                    $endpoint = 'ChatList/';
                    $data = [
                        'userId' => $mId,

                    ];

                    $apiData = callAPI($endpoint, $data);

                    foreach ($apiData as $chat) {
                        // $userName = $chat['userName'];
                        // $sender = $chat['sender'];

                        echo '<a href="#" data-userId="' . $chat['sender'] . '">';
                        echo '<div class="content">';
                        echo '<img src="user_icon/default-profile-picture.jpg" alt="">';
                        echo '<div class="details">';
                        echo '<span>' . $chat['userName'] . '</span>';
                        echo ' <p>. . . .</p>';
                        echo '</div></div></a>';
                    }
                    ?>


                    <!-- <a href="#">
                        <div class="content">
                            <img src="user_icon/default-profile-picture.jpg" alt="">
                            <div class="details">
                                <span>Saaal</span>
                                <p>This is a test message</p>
                            </div>
                        </div>
                    </a>-->

                </div>
            </section>

            <!-- Chat Area Section -->
            <section class="chat-area">
                <header>
                    <a href="#" class="back-icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <img src="user_icon/default-profile-picture.jpg" alt="">
                    <div class="details">
                        <span>Jennnny</span>
                    </div>
                </header>
                <div class="chat-box">
                    <!-- <div class="chat outgoing">
                        <div class="details">
                            <p>Hello</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>Hi!</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>Where are you from?</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>I want to know uu</p>
                        </div>
                    </div> -->
                </div>
                <form action="#" class="typing-area" id="messageForm">
                    <input type="text" id="messageInput" placeholder="Type a message here..."
                        value="<?php echo isset($_GET['fromApplyList']) && $_GET['fromApplyList'] === 'true' ? 'We have received your job application recently, please send us your resume for reference.' : ''; ?>">
                    <button type="button" id="sendMessageBtn"><i class="fa fa-paper-plane"
                            aria-hidden="true"></i></button>
                </form>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmLogout() {
            var isConfirmed = confirm('Are you sure you want to logout?');

            if (isConfirmed) {
                window.location.href = 'home.php';
            } else {
                phpversion();
            }
        }

        $(document).ready(function () {
            $(".users-list a").click(function (event) {
                event.preventDefault();
                var selectedUserName = $(this).find('.details span').text();
                updateChatHeader(selectedUserName);
            });

            function updateChatHeader(userName) {
                $(".chat-area header .details span").text(userName);
            }
        });

        $(document).ready(function () {
            $("#sendMessageBtn").click(function () {
                var message = $("#messageInput").val();

                if (message.trim() !== "") {
                    appendOutgoingMessage(message);

                    $("#messageInput").val("");
                }
            });

            function appendOutgoingMessage(message) {
                var chatBox = $(".chat-area .chat-box");
                var outgoingChat = '<div class="chat outgoing"><div class="details"><p>' + message + '</p></div></div>';
                chatBox.append(outgoingChat);

                chatBox.scrollTop(chatBox[0].scrollHeight);
            }
        });
    </script>

    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>