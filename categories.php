<?php include('includes/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/otherpage.css">
    <title>Products - Ann Electric</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script type="text/javascript" src="assets/templates/youda/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="assets/templates/youda/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.flexslider').flexslider({
                directionNav: true,
                pauseOnAction: false
            });
        });
    </script>
    <style>
        .menu_box a.selected_d {
            color: #fff !important;
            background: #0d6cac;
        }
    </style>
    <script type="text/javascript" charset="utf-8" src="assets/templates/youda/js/common.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".flip").click(function() {

                var aa = $(this).parent().next(".panel").css('display');
                if (aa == "none") {
                    $(this).parent().css({
                        "background": "#0d6cac"
                    });
                    $(this).css({
                        "color": "#fff"
                    });
                } else {

                    $(this).parent().css({
                        "background": "url(assets/templates/youda/images/bg_08.png) no-repeat left center"
                    });
                    $(this).css({
                        "color": "#333333"
                    });
                }
                $(this).parent().next(".panel").slideToggle("slow");
            });
        });
    </script>

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
        <!--/Header-->

        <div class="clear"></div>
        
        <div class="pic_box"><img src="assets/templates/youda/images/pic_09.png"></div>
        <div class="content">
            <div class="center">
                <div class="title_box">
                    <dl>
                        <dt>PRODUCTS</dt>
                        <dd>Quality for life</dd>
                    </dl>
                </div>


                <div class="product" id="clicktab">

                    <?php include('includes/productnav.php'); ?>

                    <div class="product_right">
                        <div class="product_list">
                            <!--DataTable-->

                            <?php
                            $cid = intval($_GET['cid']);
                            $sql = "SELECT tblproducts.id, tblproducts.ProductName,tblproducts.SubCategory,tblproducts.Image1
                                    from tblproducts where tblproducts.Category = :cid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {?>
        
                                <dl>
                                    <a href="showproduct.php?id=<?php echo htmlentities($result->id);?>">
                                        <dt>
                                            <p><img src="admin/img/productimages/<?php echo htmlentities($result->Image1);?>"></p>
                                        </dt>
                                        <dd><?php echo htmlentities($result->ProductName);?></dd>
                                    </a>
                                </dl>
        
                                <?php }
                            } else {?>
                                <div class="container">
                                    <h1>Ooop! We ddnt find the products you specified.</h1>
                                </div>
                            <?php }
                            ?>

                            <div class="clear"></div>
                        </div>

                        <div class="clear"></div>

                        <div class="pagelist">
                            <a><<</a>
                            <a><</a>
                            <a class="selected">1</a>
                            <a href="product/0/2.html">2</a>
                            <a href="product/0/3.html">3</a>
                            <a href="product/0/4.html">4</a>
                            <span>...</span>
                            <a href="product/0/52.html">></a>
                            <a href="product/0/53.html">>></a>
                        </div>

                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>

        
        <div class="clear"></div>

        <!--footer-->
        <?php include('includes/footer.php'); ?>
        <!--/footer-->
    </div>

    <script type="text/javascript" src="pagead/f.txt"></script>

    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="pagead/viewthroughconversion/871990639/index.htm.gif?guid=ON&amp;script=0">
        </div>
    </noscript>

</body>

</html>