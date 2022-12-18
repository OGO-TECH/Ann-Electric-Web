<?php include('includes/config.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Ann Electric - About us</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="apple-touch-fullscreen" content="YES" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta content="-1" http-equiv="Expires" />
  <meta content="no-cache" http-equiv="pragram" />
  <meta name="viewport" content="width=1080, user-scalable=no, target-densitydpi=device-dpi" />
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
        document.write(
          '<meta name="viewport" content="width=1080, minimum-scale = ' +
          phoneScale +
          ", maximum-scale = " +
          phoneScale +
          ', target-densitydpi=device-dpi">'
        );
        // andriod 2.3以上
      } else {
        document.write(
          '<meta name="viewport" content="width=1080, target-densitydpi=device-dpi">'
        );
      }
      // 其他系统
    } else {
      document.write(
        '<meta name="viewport" content="width=1080, user-scalable=no, target-densitydpi=device-dpi">'
      );
    }
  </script>
  <script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript">
    var status = 1;
    var Menus = new DvMenuCls();

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
          $(this).parent().next(".panel").css("display");
          $(this).parent().next(".panel").slideToggle("slow");
        });
        $(".flip2").click(function() {
          $(this).children(".panel2").css("display");
          $(this).children(".panel2").slideToggle("slow");
        });
      });
    </script>

    <div class="content">
      <div class="about">
        <p>
          Wenzhou youda electric co.,ltd is a specialized enterprise in
          researching, manufacturing and sale electrical products located in
          Binhai area,Wenzhou Economic-Technological Development Zone.We are
          the member of China Mechanical and electrical products import and
          export chamber of commerce; A-level management enterprise in Chinese
          Customs' List of reputation management .Our goods has been exported
          to more than 20 countries and regions in ASEAN,Africa,Europe and
          middle east.Our brand "MG" won good reputation in the related
          market.
        </p>
        <p>
          Our high quality research,management and technical team are oriented
          to comprehensive quality management.By strictly carrying out
          standards of ISO9001:2008 international quality management system
          and 5S management,our goods various technical performance indexes
          meet the requirement of domestic and international standards. We
          obtain SONCAP,TBS,CE certificate for product access qualification
          certificate. In 2013 we obtain a patent for electric products
          package design awarded by China's State Intellectual Property
          Office.In 2014,it won Utility Model Patent Certificate.Our aboratory
          room under construction would be the most perfect one in the line of
          electrical accessories used in civil architecture.
        </p>
        <p>
          <img alt="" src="../../upload/201610/22/201610220849224922.png" />
        </p>
        <p>
          We have developed more than 10 series (200 specifications )switch
          and sockets;more than 100 specifications of lamp holder and junction
          box;also related products including ventilator,insulating tape,LED
          light, energy saving lamp, knife switch,extension socket,breakers
          and consumer unit etc.And annual foreign exchange earnings reaches
          to more than $7 million. And we offer One-Stop Service for solution
          of engineering and household electric.
        </p>
        <p>
          With the tenet of reasonable price,effective production time and
          good After-sales service and policy of unity
          ,Diligence,objectivity,innovation we can offer the best quality
          products and perfect service.<img alt="" src="../../upload/201611/08/201611081541164986.jpg" /><img alt="" src="../../upload/201611/08/201611081541324536.jpg" /><img alt="" src="../../upload/201611/08/201611081541402982.jpg" />
        </p>
      </div>
    </div>

    <!--footer-->

    <?php include('includes/footer.php') ?>

    <!--footer-->

    <script>
      $(document).ready(function() {
        $(".footer_btn").click(function() {
          $(this).siblings(".footer_hide").stop(true, true).slideToggle();
          $(this).parent().siblings().children(".footer_hide").hide();
        });

        $(".footer")
          .siblings()
          .click(function() {
            $(".footer dl .footer_hide").hide();
          });

        $(".footer_btn2").click(function() {
          $(this).children(".footer_hide2").stop(true, true).slideToggle();
          $(this).siblings().children(".footer_hide2").hide();
          var aa = $(this).children(".footer_hide2").css("display");
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

<!-- Mirrored from youda.cc/youda_wx/about/about-82.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Dec 2022 14:55:25 GMT -->

</html>