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

<style>
    .circle-chart {
        margin: -60px auto;
        display: block;
    }
</style>


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
                            <a href="Admin_feedback_records.php" class="nav-link">FEEDBACK REPORT</a>
                        </li>

                        <li class="logout">
                            <a href="#" class="nav-link" onclick="confirmLogout()"><img src="nav_img/logout.png" alt="logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="">
            <h1 class="text-center mt-3">Feedback Report</h1>

            <div class="row mt-4">
                <div class="p-2">
                    <h3 style="margin-left: 10px; text-decoration: underline;"><strong>For System</strong></h3>
                </div>
                <div class="col-md-5">
                    <p class="text-center"><strong>The lesson sections contain enough content</strong></p>
                    <canvas id="q1Chart" class="circle-chart" width="450" height="450"></canvas>
                </div>
                <div class="col-md-5">
                    <p class="text-center"><strong>There are an adequate number of sections</strong></p>
                    <canvas id="q2Chart" class="circle-chart" width="450" height="450"></canvas>
                </div>
            </div>

            <div class="color-legend">
                <?php
                $legendItems = array(
                    array("#D3D3D3", "1 - Totally Disagree"),
                    array("#98FB98", "2 - Disagree"),
                    array("#FFB6C1", "3 - Neutral"),
                    array("#87CEEB", "4 - Agree"),
                    array("#9370DB", "5 - Totally Agree")
                );

                // Loop to generate legend items for ratings
                foreach ($legendItems as $item) {
                    echo '<div class="legend-item">';
                    echo '<span class="color-box" style="background-color: ' . $item[0] . ';"></span>';
                    echo '<span class="rating-text">' . $item[1] . '</span>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="p-2">
                <h3 style="margin-left: 0px; text-decoration: underline;"><strong>For Section</strong></h3>
            </div>
            <div class="lesson-dropdown2">
                <label for="lesson-select">Select Lesson:</label>
                <select id="lesson-select" onchange="updateHorizontalBarCharts()">
                    <option value="L01">Lesson 1: Daily Communication</option>
                    <option value="L02">Lesson 2: Travel Communication</option>
                    <option value="L03">Lesson 3: Workplace Communication</option>
                </select>

                <div class="color-box-container2">
                    <span class="color-box2" style="background-color: #D3D3D3;"></span>
                    <span class="color-rating">1 - Totally Disagree </span>

                    <span class="color-box2" style="background-color: #98FB98;"></span>
                    <span class="color-rating">2 - Disagree</span>

                    <span class="color-box2" style="background-color: #FFB6C1;"></span>
                    <span class="color-rating">3 - Neutral</span>

                    <span class="color-box2" style="background-color: #87CEEB;"></span>
                    <span class="color-rating">4 - Agree</span>

                    <span class="color-box2" style="background-color: #9370DB;"></span>
                    <span class="color-rating">5 - Totally Agree</span>
                </div>
            </div>
            <label style="margin-left: 30px;" for="section-select">Select Section:</label>
            <select id="section-select" onchange="updateHorizontalBarCharts2()">
                <!-- <option value="S001">Section 1</option>
                <option value="S002">Section 2</option>
                <option value="S003">Section 3</option>
                <option value="S004">Section 4</option>
                <option value="S005">Section 5</option>
                <option value="S006">Section 6</option>
                <option value="S007">Section 7</option>
                <option value="S008">Section 8</option>
                <option value="S009">Section 9</option>
                <option value="S010">Section 10</option>
                <option value="S011">Section 11</option>
                <option value="S012">Section 12</option>
                <option value="S013">Section 13</option>
                <option value="S014">Section 14</option>
                <option value="S015">Section 15</option> -->
            </select>

            <div class="section-feedback-titles">
                <div class="chart-title"><strong>The learning material meets my requirement.</strong></div>
                <div class="chart-title"><strong>There are enough supporting media resources.</strong></div>
                <div class="chart-title"><strong>The explanation of learning material is clear.</strong></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- <h3>Q3 Distribution</h3> -->
                    <canvas id="q3Chart" width="400" height="200"></canvas>
                </div>
                <div class="col-md-4">
                    <!-- <h3>Q4 Distribution</h3> -->
                    <canvas id="q4Chart" width="400" height="200"></canvas>
                </div>
                <div class="col-md-4">
                    <!-- <h3>Q5 Distribution</h3> -->
                    <canvas id="q5Chart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <script>
            <?php
            include 'callAPI.php';

            $endpoint = 'GetFeedback/';
            $data = [];

            $apiData = callAPI($endpoint, $data);

            $q1Data = array("1" => 0, "2" => 0, "3" => 0, "4" => 0, "5" => 0);
            $q2Data = array("1" => 0, "2" => 0, "3" => 0, "4" => 0, "5" => 0);

            foreach ($apiData as $feedback) {

                $q1Score = $feedback['q1'];
                $q2Score = $feedback['q2'];

                $q1Data[$q1Score]++;
                $q2Data[$q2Score]++;
            }
            ?>

            var q1ChartCanvas = document.getElementById("q1Chart");
            var q1Ctx = q1ChartCanvas.getContext("2d");

            var q2ChartCanvas = document.getElementById("q2Chart");
            var q2Ctx = q2ChartCanvas.getContext("2d");

            function drawChart(ctx, data) {
                var centerX = ctx.canvas.width / 2;
                var centerY = ctx.canvas.height / 2;
                var radius = Math.min(ctx.canvas.width, ctx.canvas.height) / 3;
                var startAngle = -Math.PI / 2;

                var total = Object.values(data).reduce((acc, cur) => acc + cur, 0);

                var colors = ['#D3D3D3', '#98FB98', '#FFB6C1', '#87CEEB', '#9370DB'];

                var endAngle = startAngle;

                for (var score in data) {
                    var percentage = data[score] / total;
                    var endAngle = startAngle + (2 * Math.PI * percentage);

                    var midAngle = startAngle + (endAngle - startAngle) / 2;
                    var textX = centerX + (radius / 2) * Math.cos(midAngle);
                    var textY = centerY + (radius / 2) * Math.sin(midAngle);

                    ctx.beginPath();
                    ctx.moveTo(centerX, centerY);
                    ctx.arc(centerX, centerY, radius, startAngle, endAngle, false);
                    ctx.closePath();
                    ctx.fillStyle = colors[score - 1];
                    ctx.fill();

                    ctx.fillStyle = '#000000';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.font = '12px Arial';
                    ctx.fillText((percentage * 100).toFixed(2) + '%', textX, textY);

                    startAngle = endAngle;
                }
            }


            drawChart(q1Ctx, <?php echo json_encode($q1Data); ?>);
            drawChart(q2Ctx, <?php echo json_encode($q2Data); ?>);

            var q3Canvas = document.getElementById("q3Chart");
            var q4Canvas = document.getElementById("q4Chart");
            var q5Canvas = document.getElementById("q5Chart");

            var q3Ctx = q3Canvas.getContext("2d");
            var q4Ctx = q4Canvas.getContext("2d");
            var q5Ctx = q5Canvas.getContext("2d");


            var apiData = <?php echo json_encode($apiData); ?>;

            function filterDataByLessonId(lessonId) {
                return apiData.filter(function(item) {
                    return item.lessonId === lessonId;
                });
            }

            function calculateRatingDistribution(data) {
                var ratingDistribution = {
                    q3: [0, 0, 0, 0, 0],
                    q4: [0, 0, 0, 0, 0],
                    q5: [0, 0, 0, 0, 0]
                };

                var total = data.length;

                data.forEach(function(item) {
                    ratingDistribution.q3[item.q3 - 1]++;
                    ratingDistribution.q4[item.q4 - 1]++;
                    ratingDistribution.q5[item.q5 - 1]++;
                });

                for (var key in ratingDistribution) {
                    ratingDistribution[key] = ratingDistribution[key].map(function(count) {
                        return (count / total) * 100;
                    });
                }

                return ratingDistribution;
            }

            function drawStackedBarChart(ctx, data, colors) {
                var barWidth = 320;
                var barHeight = 40;
                var startX = 50;
                var startY = 50;
                var percentagePositionX = startX + barWidth / 2;

                for (var i = 0; i < data.length; i++) {
                    var offsetX = startX;

                    for (var j = 0; j < data[i].length; j++) {
                        var percentage = data[i][j];
                        var barLength = (percentage / 100) * barWidth;

                        if (percentage > 0) {

                            ctx.fillStyle = colors[j];
                            ctx.fillRect(offsetX, startY, barLength, barHeight);

                            var colorBoxSize = 15;
                            var colorBoxX = offsetX + (barLength - colorBoxSize) / 2;
                            var colorBoxY = startY + barHeight + 5;
                            ctx.fillStyle = colors[j];
                            ctx.fillRect(colorBoxX, colorBoxY, colorBoxSize, colorBoxSize);

                            var percentageText = percentage.toFixed(2) + '%';
                            var textX = offsetX + barLength / 2;
                            var textY = startY + barHeight + colorBoxSize + 15;
                            ctx.fillStyle = '#000000';
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';
                            ctx.font = '12px Arial';
                            ctx.fillText(percentageText, textX, textY);
                        }

                        offsetX += barLength;
                    }

                    startY += barHeight + colorBoxSize + 20;
                }
            }

            function updateStackedBarCharts(lessonId) {
                var lessonData = filterDataByLessonId(lessonId);
                var ratingDistribution = calculateRatingDistribution(lessonData);

                q3Ctx.clearRect(0, 0, q3Canvas.width, q3Canvas.height);
                q4Ctx.clearRect(0, 0, q4Canvas.width, q4Canvas.height);
                q5Ctx.clearRect(0, 0, q5Canvas.width, q5Canvas.height);

                var colors = ['#D3D3D3', '#98FB98', '#FFB6C1', '#87CEEB', '#9370DB'];

                drawStackedBarChart(q3Ctx, [ratingDistribution.q3], colors);
                drawStackedBarChart(q4Ctx, [ratingDistribution.q4], colors);
                drawStackedBarChart(q5Ctx, [ratingDistribution.q5], colors);
            }

            var defaultLessonId = document.getElementById("lesson-select").value;
            updateStackedBarCharts(defaultLessonId);

            document.getElementById("lesson-select").addEventListener("change", function() {
                var selectedLessonId = this.value;
                updateStackedBarCharts(selectedLessonId);
            });

            document.getElementById("lesson-select").addEventListener("change", function() {
                var selectedLessonId = this.value;
                updateSectionOptions(selectedLessonId);
            });

            function updateSectionOptions(lessonId) {
                var sectionSelect = document.getElementById("section-select");
                sectionSelect.innerHTML = "";

                var sectionOptions = {
                    "L01": [{
                            id: "S001",
                            name: "Number and Letter"
                        },
                        {
                            id: "S002",
                            name: "Time Related"
                        },
                        {
                            id: "S003",
                            name: "Weather"
                        },
                        {
                            id: "S004",
                            name: "Animal"
                        },
                        {
                            id: "S005",
                            name: "Greeting"
                        }
                    ],
                    "L02": [{
                            id: "S006",
                            name: "Place"
                        },
                        {
                            id: "S007",
                            name: "Food"
                        },
                        {
                            id: "S008",
                            name: "Transportation"
                        },
                        {
                            id: "S009",
                            name: "Festival"
                        },
                        {
                            id: "S010",
                            name: "Phrase for travel"
                        }
                    ],
                    "L03": [{
                            id: "S011",
                            name: "Job Occupation"
                        },
                        {
                            id: "S012",
                            name: "Job Related Tools"
                        },
                        {
                            id: "S013",
                            name: "Workplace Environment"
                        },
                        {
                            id: "S014",
                            name: "Vocabulary for Meeting"
                        },
                        {
                            id: "S015",
                            name: "Interview"
                        }
                    ]
                };

                var sections = sectionOptions[lessonId];

                sections.forEach(function(section) {
                    var option = document.createElement("option");
                    option.value = section.id;
                    option.text = section.name;
                    sectionSelect.appendChild(option);
                });
            }

            var defaultLessonId = document.getElementById("lesson-select").value;
            updateSectionOptions(defaultLessonId);

            function updateStackedBarCharts2(sectionId) {
                var sectionData = filterDataBySectionId(sectionId);
                var ratingDistribution = calculateRatingDistribution(sectionData);

                q3Ctx.clearRect(0, 0, q3Canvas.width, q3Canvas.height);
                q4Ctx.clearRect(0, 0, q4Canvas.width, q4Canvas.height);
                q5Ctx.clearRect(0, 0, q5Canvas.width, q5Canvas.height);

                var colors = ['#D3D3D3', '#98FB98', '#FFB6C1', '#87CEEB', '#9370DB'];

                drawStackedBarChart(q3Ctx, [ratingDistribution.q3], colors);
                drawStackedBarChart(q4Ctx, [ratingDistribution.q4], colors);
                drawStackedBarChart(q5Ctx, [ratingDistribution.q5], colors);
            }

            function filterDataBySectionId(sectionId) {
                return apiData.filter(function(item) {
                    return item.sectionId === sectionId;
                });
            }


            document.getElementById("section-select").addEventListener("change", function() {
                var selectedLessonId = this.value;
                updateStackedBarCharts2(selectedLessonId);
            });
        </script>

        <script src="aa.js"></script>
        <script src="header.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>