<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYP</title>
    <link rel="stylesheet" type="text/css" href="aa.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    .pagination-button {
        background-color: transparent;
        color: black;
        text-decoration: underline;
        border: none;
        outline: none;
    }
</style>

<body>
    <div class="background-color">
    <header class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="#" class="navbar-brand">SIGN</a>

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

        <div class="p-5">
            <h2 class="text-center">Latest News</h2>
            <div class="card-body text-start" id="news-container"></div>

            <script>
                var newsContainer = document.getElementById("news-container");

                function fetchMessages() {
                    return new Promise((resolve) => {
                        var messages = [{
                                date: "2023-10-01",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-02",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-03",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-04",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-05",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-06",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-07",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-08",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-09",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-10",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-11",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-12",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-13",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-14",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-15",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-16",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-17",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-18",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-19",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-20",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-21",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-22",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-23",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-24",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-25",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-26",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                            {
                                date: "2023-10-27",
                                content: ".....",
                                link: "https://www.deaf.org.hk"
                            },
                        ];

                        resolve(messages);
                    });
                }

                function generateMessages() {
                    fetchMessages().then(function(messages) {
                        var html = "";
                        for (var i = 0; i < messages.length; i++) {
                            var message = messages[i];
                            var messageHtml =
                                "<p>" +
                                message.date +
                                ' <a href="' +
                                message.link +
                                '">' +
                                message.content +
                                "</a></p>";
                            html += messageHtml;
                        }
                        newsContainer.innerHTML = html;
                    });
                }

                generateMessages();
            </script>
        </div>
        <div id="pagination-container" class="mt-3 text-center"></div>
        <button id="backToTopBtn" class="btn btn-dark rounded-circle back-to-top-btn" title="Back to Top">
            <i class="bx bx-chevron-up"></i>
        </button>
</div>
    <!--link to js-->
    <script src="aa.js"></script>
    <script src="header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="card-body text-start border-bottom" id="news-container"></div>
    <div id="pagination-container"></div>

    <script>
        var newsContainer = document.getElementById("news-container");
        var paginationContainer = document.getElementById("pagination-container");
        var messages = newsContainer.getElementsByTagName("p");
        var messagesPerPage = 20;
        var currentPage = 1;

        function showPage(pageNumber) {
            var startIndex = (pageNumber - 1) * messagesPerPage;
            var endIndex = startIndex + messagesPerPage;

            for (var i = 0; i < messages.length; i++) {
                if (i >= startIndex && i < endIndex) {
                    messages[i].style.display = "block";
                } else {
                    messages[i].style.display = "none";
                }
            }
        }

        function createPaginationButtons() {
            var pageCount = Math.ceil(messages.length / messagesPerPage);

            for (var i = 1; i <= pageCount; i++) {
                var button = document.createElement("button");
                button.textContent = i;
                button.classList.add("pagination-button", "btn", "btn-primary", "me-2");
                button.addEventListener("click", function() {
                    currentPage = parseInt(this.textContent);
                    showPage(currentPage);
                });

                paginationContainer.appendChild(button);
            }
        }

        function initializePagination() {
            showPage(currentPage);
            createPaginationButtons();
        }

        initializePagination();
    </script>
</body>

</html>