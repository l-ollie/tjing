<?php
/*
* Ajax form submit
*/

# request sent using HTTP_X_REQUESTED_WITH
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
  if (isset($_POST['email']) AND isset($_POST['subject']) AND isset($_POST['message'])) {
    $to = 'info@tjing.it';


    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $sent = email($to, $email, $name, $subject, $message);
    if ($sent) {
      echo 'Message sent!';
    } else {
      echo 'Message couldn\'t sent!';
    }
  } else {
    echo 'All Fields are required';
  }
  return;
}

/**
* email function
*
* @return bool | void
**/
function email($to, $from_mail, $from_name, $subject, $message)
{
  $header = array();
  $header[] = "MIME-Version: 1.0";
  $header[] = "From: {$from_name}<{$from_mail}>";
  /* Set message content type HTML*/
  $header[] = "Content-type:text/html; charset=iso-8859-1";
  $header[] = "Content-Transfer-Encoding: 7bit";
  if (mail($to, $subject, $message, implode("\r\n", $header))) return true;
}

?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tjing it</title>

  <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">
<link rel="manifest" href="assets/site.webmanifest">
<link rel="mask-icon" href="assets/safari-pinned-tab.svg" color="#00979d">
<meta name="msapplication-TileColor" content="#00979d">
<meta name="theme-color" content="#000000">

  <link href="https://fonts.googleapis.com/css?family=Roboto:100.300,400,400i" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="dist/style.css">


  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js"></script>
  <script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
  <script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
  <script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/CSSPlugin.min.js"></script>
  <script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/plugins/AttrPlugin.min.js"></script>
  <style></style>

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="scroll-indicator">
        <div class="icon-scroll">
          <span class="scroll-indicator-text">Scroll down</span>

        </div>
      </div>
      <div class="intro-animation-container">

        <div class="ledstrip-container">
          <div class="left-side">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
          </div>
          <div class="circle-exposion-container">
          </div>
          <div class="right-side">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
          </div>
        </div>

      </div>
      <div class="intro-lenth"></div>
    </div>

    <!--FIRST PART-->

    <div class="row color-dark height-100vh row-padding">

      <div class="row row-content z-index4">
        <div class="col-12">
          <h1 class="container-title">The game</h1>
        </div>
      </div>

      <div class="row row-content height-80vh vertical-padding">
        <div class="col-lg-4 col-md-12 ">
          <h3>Pong brought to life</h3>
          <p>One of the earliest arcade video games now handcrafted, in wood.
            Take it anywhere with the handcrafted portable game console.
            A combination of light and sound.
          </p>
        </div>

        <div class="col-lg-4 col-md-12  align-center ">
          <img class="img-fluid img-fluid-center" src="assets/placeholder-01.png">
        </div>

        <div class="col-lg-4 col-md-12 align-bottom ">
          <h3>The competition</h3>
          <p>Get the competition going with the Pong-like high response game.
            Beat the opponent by slamming the button first and being the best at your game. Not fast enough? Get creative and use a distraction!

          </p>
        </div>

        <!-- <div class="row row-content vertical-padding">
        <div class="col-md-12 col-lg-4 offset-lg-4 ">
        <button type="button" href="#" class="btn btn-primary btn-light">Primary</button>
      </div>
    </div> -->
  </div>
</div>

<!--SECOND PART-->

<div class="row color-light height-100vh row-padding">
  <div class="row row-content">
    <div class="col-12">
      <h1 class="container-title text-right">What is the game</h1>
    </div>
  </div>

  <div class="row row-content vertical-margin ">
    <div class="col-lg-5 offset-lg-1 col-md-12 ">
      <img class="img-fluid float-right2" src="assets/Fast.png">
    </div>
    <div class="col-lg-5 col-md-12">
      <h3>Fast and the furious</h3>
      <p>TJING is fast. One ball, two goals - make it count!    <br>
        The light strand is the playing field.
        Yellow ball shoots back and forth with sound.
        Arcade buttons at each side of the strand.
      </p>
    </div>
  </div>

  <div class="row row-content vertical-margin ">
    <div class="col-md-12 col-lg-5 col-md-push-12 order-lg-2">
      <img class="img-fluid" src="assets/Timing.png">
    </div>

    <div class="col-lg-5 order-lg-1 offset-lg-1 col-md-12 text-right ">
      <h3>It's <i>all</i> about timing</h3>
      <p>
        Battle against your rival by slamming the button at just the right time. Score points by being the fastest. Bounce the ball just inside the blue zone. The longer you delay, the faster the bounce. But be careful....don't let it slip away.
      </p>
    </div>
  </div>

  <div class="row row-content vertical-margin ">
    <div class="col-md-12  col-lg-5 offset-lg-1">
      <img class="img-fluid float-right2" src="assets/Win.png">
    </div>

    <div class="col-md-12 col-lg-5">
      <h3>For the win</h3>
      <p>
        Beat your nemesis. The first to ten points is the winner! But don't wait too long, you're not the only one who wants to win. Enjoy the winner’s tune. The winner gets the victory, the loser gets nothing. The score is what counts.
      </p>
    </div>
  </div>
</div>

<!--THIRD PART-->

<div class="row color-dark height-100vh row-padding">
  <div class="row row-content">
    <div class="col-12">
      <h1 class="container-title">Details to perfection</h1>
    </div>
  </div>

  <div class="row row-content">
    <div class="col-md-12 col-lg-7 align-center side-img-height align-vertical-center">
      <img class="img-fluid side-img" src="assets/placeholder-02.png">
    </div>

    <div class="col-md-12 col-lg-5 side-img-height align-vertical-center">
      <div class="">
        <!-- <h3>Description title</h3> -->
        <p class="text-column2-sm">

          TJING is a two-player portable game console made from the strongest solid beechwood. With its simple and elegant design, and hard waxed oil finish, it is handcrafted to perfection.
          <br>
          The console has a built-in rechargeable battery. Charge the battery with the power cable and USB charger, included. You can even charge TJING with your mobile phone, using a suitable adapter. You can play TJING while it’s charging.
        </p>
      </div>
    </div>
  </div>
</div>

<!--FOURTH PART-->

<div class="row color-light  height-100vh row-padding panel">
  <div class="row row-content">
    <div class="col-12">
      <h1 class="container-title text-right">
        The hardware
      </h1>
    </div>
  </div>

  <div class="row row-content">
    <div class=" col-9 vertical-center-2 ">
      <div class="col-12 vertical-margin  col-md-9">
        <h3>Specs</h3>
        <!-- <p>Description about the product <br> -->
        <p>
          Rectangular beam from solid European beechwood.
          <br>
          Finishing of  three layers of hard-waxed oil.
          <br><br>
          Full color RGB LEDstrip
          <br>
          White LED string protected with waterproof silicone rubber sheath (IP65 protection rating
          <br><br>
          Battery capacity: 2200mAh
          <br>
          Playing time:  6-7 hours approx
          <br>
          Charging time: 5-6 hours approx, you can play during charging
          <br>
          Battery type: rechargeable Lithium ion
          <br>
          USB charger and cable provided

        </p>
      </div>

      <div class="col-12  col-md-9">
        <h3>Dimensions</h3>
        <p>
          Length: 80 cm (31.5 in)
          <br>
          Width: 6 cm (2.3 in)
          <br>
          Thickness: 3.5 cm (1.3 in)
          <br>
          Weight: 1 kg (2 lb 3 oz)
        </p>
      </div>
    </div>

    <div class=" col-3 flex-display">
      <img class="img-fluid height-70vh align-bottom" src="assets/placeholder-03.png">
    </div>
  </div>
</div>

<!--FIFTH PART-->

<div class="row color-dark height-100vh row-padding">
  <div class="row row-content">
    <div class="col-12">
      <h1 class="container-title text-center">Just Tjing It</h1>
    </div>
  </div>

  <div class="row row-content ">
    <div class="  col-sm-12 col-lg-6 ">
      <img class="img-fluid" src="assets/placeholderImg.png">
    </div>

    <div class=" col-sm-12 col-lg-6 vertical-center-5">
      <h3>TJING it with your family</h3>
      <p>
        Play with your family.
        Kids, parents and even grandparents will find it easy and exciting.
      </p>
    </div>
  </div>

  <div class="row row-content">
    <div class=" col-sm-12 order-lg-2 col-lg-6">
      <img class="img-fluid" src="assets/placeholderImg.png">
    </div>

    <div class="col-sm-12 order-lg-1 col-lg-6 vertical-center-5">
      <h3>
        TJING it with friends
      </h3>
      <p>
        Play with your friends.
        <br>
        Great fun at a party.
      </p>
    </div>
  </div>
  <div class="row row-content ">
    <div class="  col-sm-12 col-lg-6 ">
      <img class="img-fluid" src="assets/placeholderImg.png">
    </div>

    <div class=" col-sm-12 col-lg-6 vertical-center-5">
      <h3>
        TJING it with customers or clients
      </h3>
      <p>
        Invite customers or clients to play.
        <br>
        Laugh together, relieve tension.
      </p>
    </div>
  </div>

  <div class="row row-content">
    <div class=" col-sm-12 order-lg-2 col-lg-6">
      <img class="img-fluid extra-bottom" src="assets/placeholderImg.png">
    </div>

    <div class="col-sm-12 order-lg-1 col-lg-6 vertical-center-5">
      <h3> TJING it wherever you want
        <br>
        Enjoy the winner’s tune.
      </h3>
      <p>
        Tense? Play TJING.
        Relax.
      </p>
    </div>
  </div>
</div>


<!-- ====== contacnt -->

<div class="row color-light  row-padding">
  <div class="row row-content">
    <div class="col-12">
      <h1 class="container-title text-center">
        Contact
      </h1>
    </div>
  </div>

  <div class="row row-content">
    <div class=" col-12 vertical-center-2 ">

      <section id="contact" class="contact-section">
        <div class="container">
          <div class="row">

            <div class="col-sm-12  col-lg-6 offset-lg-3">
              <form class="form-horizontal" id="form" action="" method="post">
                <fieldset>
                  <p class="alert">
                    For more information send an e-mail
                  </p>

                  <div class="form-group">
                    <div class="col-12">
                      <input placeholder="Name" type="text" name="name" required
                      class="form-control">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-12">
                      <input placeholder="Email address" type="email" name="email"
                      required
                      class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-12">
                      <input placeholder="Subject" type="text" name="subject"
                      class="form-control">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-12">
                      <textarea placeholder="Type your message here...." name="message" required
                      class="form-control" rows="7"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-12 text-center">
                      <button type="submit" class="btn btn-primary btn-lg">Send email</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>

      </section>


    </div>
  </div>

</div>
<div class="row">
  <div class=" col-12" >

    <footer class="footer text-center">

      © 2019 André Weijermars

    </footer>
  </div>
</div>

<script type="text/javascript" src="dist/gsAnimation.js"></script>
<script src="dist/contact-form.js"></script>

</body>
