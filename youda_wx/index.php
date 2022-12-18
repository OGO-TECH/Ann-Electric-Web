<?php include('includes/config.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from youda.cc/youda_wx/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Dec 2022 14:54:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Wenzhou youda electric co.,ltd</title>
  <meta name="keywords" content="Wenzhou youda electric co.,ltd" />
  <meta name="description" content="Wenzhou youda electric co.,ltd" />
  <META name="apple-touch-fullscreen" content="YES">
  <META name="format-detection" content="telephone=no">
  <META name="apple-mobile-web-app-capable" content="yes">
  <META name="apple-mobile-web-app-status-bar-style" content="black">
  <META content=-1 http-equiv=Expires>
  <META content=no-cache http-equiv=pragram>
  <meta name="viewport" content="width=1080, user-scalable=no, target-densitydpi=device-dpi">
  <meta content="telephone=no" name="format-detection" />


  <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/otherpage.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript">
    var mengvalue = -1;
    //if(mengvalue<0){mengvalue=0;}
    var phoneWidth = parseInt(window.screen.width);
    var phoneScale = phoneWidth / 1080;

    var ua = navigator.userAgent;
    if (/Android (\d+\.\d+)/.test(ua)) {
      var version = parseFloat(RegExp.$1);
      // andriod 2.3
      if (version > 2.3) {
        document.write('<meta name="viewport" content="width=1080, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
        // andriod 2.3以上
      } else {
        document.write('<meta name="viewport" content="width=1080, target-densitydpi=device-dpi">');
      }
      // 其他系统
    } else {
      document.write('<meta name="viewport" content="width=1080, user-scalable=no, target-densitydpi=device-dpi">');
    }
  </script>
  <script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
    var status = 1;
    var Menus = new DvMenuCls;

    document.onclick = Menus.Clear;

    function switchSysBar() {
      var switchPoint = document.getElementById("switchPoint");
      var frmTitle = document.getElementById("frmTitle");

      if (1 == window.status) {
        window.status = 0;
        //alert(switchPoint);

        //switchPoint.style.backgroundImage = 'url(/templates/youda_wx/images/right.png)';
        frmTitle.style.display = "block";

      } else {
        window.status = 1;
        //switchPoint.style.backgroundImage = 'url(/templates/youda_wx/images/left.png)'; 
        frmTitle.style.display = "none";

      }
    }
  </script>
</head>

<body>
  <div class="container">
    <!--Header-->
    <?php include('includes/header.php') ?>
    <!--/Header-->
    <script type="text/javascript">
      $(document).ready(function() {
        $(".flip").click(function() {
          $(this).parent().next(".panel").css('display');
          $(this).parent().next(".panel").slideToggle("slow");
        });
        $(".flip2").click(function() {
          $(this).children(".panel2").css('display');
          $(this).children(".panel2").slideToggle("slow");
        });
      });
    </script>

    <div class="content">
      <div class="index_box">
        <img src="assets/images/bg_01.png" style="width:100%;" />
        <a href="about.php"><img src="assets/images/btn_01.png" /></a>
        <p>Copyright © 2023 annelectric co.,ltd All Rights Reserved. </p>
      </div>
    </div>

    <!--footer-->
    <?php include('includes/footer.php') ?>
    <!--/footer-->
    <script>
      $(document).ready(function() {
        $(".footer_btn").click(function() {
          $(this).siblings(".footer_hide").stop(true, true).slideToggle();
          $(this).parent().siblings().children(".footer_hide").hide();
        });

        $(".footer").siblings().click(function() {
          $(".footer dl .footer_hide").hide();
        });


        $(".footer_btn2").click(function() {
          $(this).children(".footer_hide2").stop(true, true).slideToggle();
          $(this).siblings().children(".footer_hide2").hide();
          var aa = $(this).children(".footer_hide2").css('display');
          if (aa == "none") {
            $(this).toggleClass("selected");

          } else {

            $(this).toggleClass("selected");
            $(this).siblings().removeClass("selected");

          }
        });

      });
    </script>
    
  </div>
</body>

</html>