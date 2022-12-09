<?php include('includes/config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/main.css">
  <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/otherpage.css">
  <title>Contact us - Ann Electric</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <script type="text/javascript" src="assets/templates/youda/js/jquery-1.7.2.min.js"></script>

  <!--<script type="text/javascript">
    $(document).ready(function() {
      $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
      });
    });
  </script>-->

  <style>
    .menu_box a.selected_e {
      color: #fff !important;
      background: #0d6cac;
    }
  </style>

  <script type="text/javascript" charset="utf-8" src="assets/templates/youda/js/common.js"></script>

</head>

<body>
  <div class="container">


    <script>
      $(function() {
        if ($.browser.msie && $.browser.version.substr(0, 1) < 7) {
          $('li').has('ul').mouseover(function() {
            $(this).children('ul').css('visibility', 'visible');
          }).mouseout(function() {
            $(this).children('ul').css('visibility', 'hidden');
          });
        }
      });
    </script>

    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!--/header-->

    <div class="clear"></div>
    <!--/Header-->
    <div class="pic_box"><img src="assets/templates/youda/images/pic_09.png"></div>
    <div class="content">
      <div class="center">
        <div class="title_box">
          <dl>
            <dt>CONTACT US</dt>
            <dd>Better Ann Better Electric</dd>
          </dl>
        </div>
        <div class="contact">

          <div class="contact_word">
            <p style="background:url(assets/templates/youda/images/icon_03.png) no-repeat left center;">Customer Care:+254708412753</p>
            <p style="background:url(assets/templates/youda/images/icon_04.png) no-repeat left center;">P.O Box:95023 80100</p>
            <p style="background:url(assets/templates/youda/images/icon_05.png) no-repeat left center;">Address:Mombasa, Mwembe Tayari,Kenya.</p>
            <p style="background:url(assets/templates/youda/images/icon_06.png) no-repeat left center;">Email:<a href="mailto:annelectric.co.ke">annelectric.co.ke</a></p>
          </div>
        </div>
      </div>

    </div>

    <div class="clear"></div>

    <!--footer-->
    <?php include('includes/footer.php'); ?>
    <!--footer-->

  </div>

  <script type="text/javascript" src="pagead/f.txt"></script>

  <noscript>
    <div style="display:inline;">
      <img height="1" width="1" style="border-style:none;" alt="" src="pagead/viewthroughconversion/871990639/index.htm.gif?guid=ON&amp;script=0">
    </div>
  </noscript>

</body>
<script>
  $(document).ready(function() {
    $(".btn1").click(function() {
      $(this).siblings(".hide1").stop(true, true).slideToggle();
      $(this).parent().siblings().children(".hide1").hide();
    });
    $(".btn2").click(function() {
      $(this).siblings(".hide1").stop(true, true).slideToggle();
      $(this).parent().siblings().children(".hide1").hide();
    });

  });
</script>

</html>