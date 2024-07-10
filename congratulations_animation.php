<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome CSS -->
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
  <!-- jQuery JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!-- TweenMax JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
  <!-- Underscore JS -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.2/underscore-min.js'></script>

  <style>
    @import url(https://fonts.googleapis.com/css?family=Sigmar+One);

    body {
      background: rgba(85, 9, 139, 0.7);
      color: #fff;
      overflow: hidden;
    }

    .congrats {
      position: absolute;
      top: 140px;
      width: 550px;
      height: 100px;
      padding: 20px 10px;
      text-align: center;
      margin: 0 auto;
      left: 0;
      right: 0;
    }

    h1 {
      transform-origin: 50% 50%;
      font-size: 50px;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      z-index: 2;
      position: absolute;
      top: 0;
      text-align: center;
      width: 100%;
    }

    .blob {
      height: 50px;
      width: 50px;
      color: #ffcc00;
      position: absolute;
      top: 45%;
      left: 45%;
      z-index: 1;
      font-size: 30px;
      display: none;
    }

    .button-container {
      display: flex;
      justify-content: center;
      margin-top: 250px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

    body {
      background: #4a0288;
      display: grid;
      height: 100vh;
      place-items: center;
      -webkit-font-smoothing: antialiased;
      width: 100vw;
    }

    button {
      animation: 1.5s ease infinite alternate running shimmer;
      background: linear-gradient(90deg, #FFE27D 0%, #64E3FF 30%, #9192FF 85%);
      background-size: 200% 100%;
      border: none;
      border-radius: 6px;
      box-shadow: -2px -2px 10px rgba(255, 227, 126, 0.5), 2px 2px 10px rgba(144, 148, 255, 0.5);
      color: #170F1E;
      cursor: pointer;
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      font-weight: 670;
      line-height: 24px;
      overflow: hidden;
      padding: 12px 24px;
      position: relative;
      text-decoration: none;
      transition: 0.2s;

      svg {
        left: -20px;
        opacity: 0.5;
        position: absolute;
        top: -2px;
        transition: 0.5s cubic-bezier(.5, -0.5, .5, 1.5);
      }

      &:hover svg {
        opacity: 0.8;
        transform: translateX(50px) scale(1.5);
      }

      &:hover {
        transform: rotate(-3deg);
      }

      &:active {
        transform: scale(0.95) rotate(-3deg);
      }

    }

    @keyframes shimmer {
      to {
        background-size: 100% 100%;
        box-shadow: -2px -2px 6px rgba(255, 227, 126, 0.5), 2px 2px 6px rgba(144, 148, 255, 0.5);
      }
    }
  </style>

  <script>

    $(function () {
      var numberOfStars = 200;

      for (var i = 0; i < numberOfStars; i++) {
        $('.congrats').append('<div class="blob fa fa-star ' + i + '"></div>');
      }

      animateText();

      animateBlobs();
    });

    $('.congrats').click(function () {
      reset();

      animateText();

      animateBlobs();
    });

    function reset() {
      $.each($('.blob'), function (i) {
        TweenMax.set($(this), { x: 0, y: 0, opacity: 1 });
      });

      TweenMax.set($('h1'), { scale: 1, opacity: 1, rotation: 0 });
    }

    function animateText() {
      TweenMax.from($('h1'), 0.8, {
        scale: 0.4,
        opacity: 0,
        rotation: 15,
        ease: Back.easeOut.config(4),
      });
    }

    function animateBlobs() {

      var xSeed = _.random(350, 380);
      var ySeed = _.random(120, 170);

      $.each($('.blob'), function (i) {
        var $blob = $(this);
        var speed = _.random(1, 5);
        var rotation = _.random(5, 100);
        var scale = _.random(0.8, 1.5);
        var x = _.random(-xSeed, xSeed);
        var y = _.random(-ySeed, ySeed);

        TweenMax.to($blob, speed, {
          x: x,
          y: y,
          ease: Power1.easeOut,
          opacity: 0,
          rotation: rotation,
          scale: scale,
          onStartParams: [$blob],
          onStart: function ($element) {
            $element.css('display', 'block');
          },
          onCompleteParams: [$blob],
          onComplete: function ($element) {
            $element.css('display', 'none');
          }
        });
      });
    }
  </script>
</head>

<body>
  <?php
  if (isset ($_GET['score']) && ($_GET['lessonId'])) {
    $score = urldecode($_GET['score']);
    $lessonId = urldecode($_GET['lessonId']);
    ?>

    <div class="congrats">
      <h1>Congratulations!<br /><br />
        Your score is
        <?php echo $score; ?> / 10
      </h1>
      <div class="button-container">
        <button onclick="window.location.href='section_quiz.php?lessonId=<?php echo $lessonId; ?>'"
          class="btn btn-primary me-2">Try Again</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button onclick="window.location.href='member_lesson.php'" class="btn btn-primary">Home Page</button>
      </div>
      <img src="https://bit.ly/20qKWK0" style="display:none">
    </div>



    <?php
  }
  ?>
</body>

</html>