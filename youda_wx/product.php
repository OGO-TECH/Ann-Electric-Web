<?php include('includes/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Product - Ann Electric</title>
  <meta name="keywords" content="Doorbell" />
  <meta name="description" content="Doorbell" />
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
      <div class="product">
        <div class="product_list">

          <?php
          $id = intval($_GET['id']);

          #Products to be diaplayed on each page.
          $per_page = 9;

          #Get current page
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          $starting_limit = ($page - 1) * $per_page;

          $query_products = $dbh->prepare("SELECT tblproducts.* from tblproducts where Category = $id or SubCategory = $id");
          $query_products->execute();
          $records = $query_products->fetchAll(PDO::FETCH_OBJ);
          $total_pages = ceil(count($records) / $per_page);

          $sql = "SELECT tblproducts.id, tblproducts.ProductName,tblproducts.SubCategory,tblproducts.Image1
                                    from tblproducts where tblproducts.Category = :id or tblproducts.SubCategory = :id ORDER BY id DESC LIMIT $starting_limit, $per_page";
          $query = $dbh->prepare($sql);
          $query->bindParam(':id', $id, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);

          if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>

              <dl>
                <a href="showproduct.php?id=<?php echo htmlentities($result->id); ?>">
                  <dt>
                    <p><img src="../admin/img/productimages/<?php echo htmlentities($result->Image1); ?>"></p>
                  </dt>
                  <dd><?php echo htmlentities($result->ProductName); ?></dd>
                </a>
              </dl>

            <?php }
          } else { ?>
            <div class="oops" style="width:70%; margin:auto">
              <h1>Ooop! We ddnt find the products you specified.</h1>
            </div>
          <?php }
          ?>

          <div class="clear"></div>
        </div>

        <?php #include('includes/pagination.php'); ?>

      </div>
    </div>
    <!--footer-->
    <?php include('includes/footer.php'); ?>
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

<!-- Mirrored from youda.cc/youda_wx/product/86.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Dec 2022 15:13:17 GMT -->

</html>