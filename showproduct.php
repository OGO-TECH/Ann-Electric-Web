<?php include('includes/config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/otherpage.css">
    <title>2 gang switch - Ann Electric </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script type="text/javascript" src="assets/templates/youda/js/jquery-1.7.2.min.js"></script>

    <style>
        .menu_box a.selected_d {
            color: #fff !important;
            background: #0d6cac;
        }
    </style>

    <script type="text/javascript" charset="utf-8" src="assets/templates/youda/js/common.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/scripts/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/scripts/jquery/jquery.jqzoom.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/templates/youda/js/picture.js"></script>
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
                <div class="product">
                    <?php
                    $id = 1 ;#intval($_GET['id'])
                    $sql = "SELECT * FROM tblproducts WHERE id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id',$id,PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;

                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                            <div class="show_product">

                                <div class="goods-pic">

                                    <div class="pic-box">
                                        <div class="pic-preview">
                                            <span class="jqzoom">
                                                <img>
                                            </span>
                                        </div>

                                        <div class="pic-scroll">
                                            <a class="prev">&lt;</a>
                                            <a class="next">&gt;</a>
                                            <div class="items">
                                                <ul>
                                                    
                                                    <li><img bimg="admin/img/productimages/<?php echo htmlentities($result->Image1);?>" src="admin/img/productimages/<?php echo htmlentities($result->Image1);?>" onmousemove="preview(this);"></li>

                                                    <li><img bimg="admin/img/productimages/<?php echo htmlentities($result->Image2);?>" src="admin/img/productimages/<?php echo htmlentities($result->Image2);?>" onmousemove="preview(this);"></li>

                                                    <li><img bimg="admin/img/productimages/<?php echo htmlentities($result->Image3);?>" src="admin/img/productimages/<?php echo htmlentities($result->Image3);?>" onmousemove="preview(this);"></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="product_canshu">
                                    <p>Part No: <?php echo htmlentities($result->PartNo);?></p>
                                    <p>Product Name: <?php echo htmlentities($result->ProductName);?></p>
                                    <p>Categoy: <?php echo htmlentities($result->Category);?></p>
                                    <p>Description:<?php echo htmlentities($result->Description);?></p>
                                    <p>Pack:<?php echo htmlentities($result->Pack);?></p>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="show_product2">
                                <h2>Details</h2>
                                <img src="admin/img/productimages/<?php echo htmlentities($result->DetImage);?>" alt="">
                            </div>
                    <?php }
                    }
                    ?>
                </div>
            </div>

        </div>


        <!--footer-->
        <?php include('includes/footer.php'); ?>
        <!--footer-->

    </div>

    <script type="text/javascript" src="pagead/f.txt"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="../pagead/viewthroughconversion/871990639/index.htm.gif?guid=ON&amp;script=0">
        </div>
    </noscript>
</body>

</html>