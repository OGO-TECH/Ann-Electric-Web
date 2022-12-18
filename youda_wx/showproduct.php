<?php include('includes/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Products - Ann Electric</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
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
  <script type="text/javascript" src="assets/js/jquery.flexslider-min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
      });
    });
  </script>
</head>

<body>
  <div class="container">

    <!--Header-->

    <?php include('includes/header.php'); ?>

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
      <?php
      $id = intval($_GET['id']);
      $sql = "SELECT tblproducts.*, category.CategoryName, category.id FROM tblproducts 
              join category on tblproducts.Category = category.id WHERE tblproducts.id=:id";
      $query = $dbh->prepare($sql);
      $query->bindParam(':id', $id, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      $cnt = 1;
      if ($query->rowCount() > 0) {
        foreach ($results as $result) { ?>
          <div class="showproduct">
            <div class="flexslider">
              <ul class="slides">

                <li><img src="../admin/img/productimages/<?php echo htmlentities($result->Image1) ?>"></li>

                <li><img src="../admin/img/productimages/<?php echo htmlentities($result->Image2) ?>"></li>

                <li><img src="../admin/img/productimages/<?php echo htmlentities($result->Image3) ?>"></li>

                <div class="clear"></div>
              </ul>
            </div>
            <div class="showproduct_word">
              <h2>Product parameters:</h2>
              <p>Part No.: <?php echo htmlentities($result->PartNo) ?></p>
              <p>Product Name: <?php echo htmlentities($result->ProductName) ?>
              <p>Category: <?php echo htmlentities($result->CategoryName) ?></p>
              <p>Description:<?php echo htmlentities($result->Description) ?></p>
              <p>Pack.: <?php echo htmlentities($result->Pack) ?></p>
            </div>
            <div class="showproduct_img">
              <ul>

                <li><img src="../admin/img/productimages/<?php echo htmlentities($result->Image1) ?>"></li>
  
                <li><img src="../admin/img/productimages/<?php echo htmlentities($result->Image2) ?>"></li>
  
                <li><img src="../admin/img/productimages/<?php echo htmlentities($result->Image3) ?>"></li>

              </ul>
            </div>
          </div>
      <?php }
      } ?>

    </div>
    <!--footer-->

    <?php include('includes/footer.php')?>

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