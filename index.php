<?php include('includes/config.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/otherpage.css">
    <title>Ann Electric</title>
    <meta name="keywords" content="Ann Electric">
    <meta name="description" content="Ann Electric">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="templates/youda/js/jquery-1.7.2.min.js"></script>

    <!--<script type="text/javascript" src="/templates/youda/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.flexslider').flexslider({
                directionNav: true,
                pauseOnAction: false
            });
        });
    </script>-->

    <style type="text/css">
        .menu_box a.selected_a {
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
        <!--/Header-->

        <div class="clear"></div>
        
        <div class="flexslider">
            <ul class="slides">
                <li style="background:url(assets/templates/youda/images/201611101654583888.png) 50% 0 no-repeat;">
                    <a href="javascript:void(0);"></a>
                </li>
            </ul>
        </div>
        
        <div style="width:100%;position:absolute;top:100px;z-index:999">
            <div class="center">
                <ul class="nav">
                    <li><a href="#"></a>
                        <ul>
                            <?php
                            $sql = "SELECT * from category where parent_id=0;";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;

                            if($query->rowCount()>0){
                                foreach ($results as $result){?>
                                    <li><a href="#"><?php echo htmlentities($result->CategoryName);?></a>
                                        <ul>
                                        <?php
                                        $catid = $result->id;
                                        $subcategory = $dbh->prepare('SELECT * from category where parent_id = ?');
                                        $subcategory->execute([$catid]);
                                        $children = $subcategory->fetchAll(PDO::FETCH_OBJ);
    
                                        if($subcategory->rowCount()>0){
                                            foreach($children as $child){?>
                                                <li><a href="#"><?php echo ($child->CategoryName);?></a></li>
                                            <?php }
                                        } ?>
                                        </ul>
                                    </li>
                               <?php }
                            }
                            ?>
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="index_box1">
            <div class="center">
                <dl class="index_title">
                    <dt>ANN ELECTRIC</dt>
                    <dd>Better Ann Better Electric</dd>
                </dl>
                <dl class="index_pic">
                    <dt><img src="assets/templates/youda/images/pic_01.png"></dt>
                    <dd><h2>About Us</h2><a href="about.php"></a></dd>
                </dl>
                <dl class="index_pic">
                    <dt><img src="assets/templates/youda/images/pic_02.png"></dt>
                    <dd><h2>Contact us</h2><a href="contact.php"></a></dd>
                </dl>
            </div>
        </div>

        <div class="index_box2">
            <div class="center">
                <dl class="index_title">
                    <dt>ABOUT US</dt>
                    <dd style="color:#fff">Better Ann Better Electric</dd>
                </dl>
                <div class="index_about">

                    <div class="index_about_left"><img src="assets/templates/youda/images/pic_04.png"></div>
                    <dl class="index_about_right">
                        <dt>COMPANY PROFILE</dt>
                        <dd class="index_about_word">
                            <p>
                                Ann Electric is a specialized enterprise in researching, 
                                manufacturing and sale electrical products located in Binhai area,Wenzhou Economic-Technological Development Zone.
                                We are the member of China Mechanical and electrical products import and export chamber of commerce; 
                                A-level management enterprise in Chinese Customs' List of reputation management.
                                Our goods has been exported to more than 20 countries and regions in ASEAN,Africa,Europe and middle east.
                                Our brand "MG" won good reputation in the related market.
                            </p>

                            <p><img alt="" src="assets/upload/201610/22/201610220849224922.png"></p>
                            
                        </dd>
                        <dd class="index_about_btn"><a href="about.php">MORE</a></dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="index_box3">
            <div class="center">
                <dl class="index_title">
                    <dt>Products</dt>
                    <dd>Better Ann Better Electric</dd>
                </dl>
                <div class="index_product">

                    <!--Products Display-->

                    <?php
                    $sql = "SELECT tblproducts.id, tblproducts.ProductName,tblproducts.Image1 from tblproducts";
                    $query = $dbh->prepare($sql);
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
                    }
                    ?>

                    <!--/Products display-->

                    <a href="product.php" class="index_product_btn">MORE</a>
                    
                </div>

            </div>
        </div>
        
        <div class="clear"></div>
        <!--Footer-->
        <?php include('includes/footer.php'); ?>
        <!--/Footer-->
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