<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="text.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>


<body>
    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="#" class="navbar-brand">SIGN</a>

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
        <div class="wrapper">
            <!-- Users Section -->
            <section class="users">
                <header>
                    <div class="content">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <span>Coding Nepal</span>
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
                    <a href="#">
                        <div class="content">
                            <img src="user_icon/default-profile-picture.jpg" alt="">
                            <div class="details">
                                <span>Sally</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                    </a>

                    <a href="#">
                        <div class="content">
                            <img src="user_icon/default-profile-picture.jpg" alt="">
                            <div class="details">
                                <span>Krystal</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="content">
                            <img src="user_icon/default-profile-picture.jpg" alt="">
                            <div class="details">
                                <span>Cherrie</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="content">
                            <img src="user_icon/default-profile-picture.jpg" alt="">
                            <div class="details">
                                <span>Thomas</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="content">
                            <img src="user_icon/default-profile-picture.jpg" alt="">
                            <div class="details">
                                <span>Sunny</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                    </a>
                </div>
            </section>

            <!-- Chat Area Section -->
            <section class="chat-area">
                <header>
                    <a href="#" class="back-icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <img src="user_icon/default-profile-picture.jpg" alt="">
                    <div class="details">
                        <span>Sally</span>
                        <!-- <p>Active now</p> -->
                    </div>
                </header>
                <div class="chat-box">
                    <div class="chat outgoing">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat outgoing">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <img src="user_icon/default-profile-picture.jpg" alt="">
                        <div class="details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <form action="" class="typing-area">
                    <input type="text" placeholder="Type a message here...">
                    <button><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </form>
            </section>
        </div>
        <footer class="p-4 border-top">
            <div class="container align-items-center justify-content-between">
                <h4>Connect</h4>
                <div class="p-4 social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>

                    <p class="p-4 mb-0 text-muted">
                        &copy; 2023 ......
                    </p>
                </div>
            </div>
        </footer>
    </div>

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
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>