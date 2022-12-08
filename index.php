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
                <li style="background:url(assets/upload/201611/10/201611101654583888.png) 50% 0 no-repeat;">
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
                            $sql = "SELECT * from tblcategory";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;

                            if($query->rowCount()>0){
                                foreach ($results as $result){?>
                                    <li><a href="#"><?php echo htmlentities($result->CategoryName);?></a></li>
                               <?php }
                            }
                            ?>
                            <!--<li><a href="product/84.html">Switches&Sockets</a>
                                <ul>
                                    <li><a href="product/108.html">Luxury Range</a></li>
                                    <li><a href="product/107.html">MG Range</a></li>
                                    <li><a href="product/105.html">Ivory Range</a></li>
                                    <li><a href="product/98.html">Alpha Range</a></li>
                                    <li><a href="product/100.html">Lavina Range</a></li>
                                    <li><a href="product/104.html">Legend E Range</a></li>
                                    <li><a href="product/103.html">Elegance Range</a></li>
                                    <li><a href="product/106.html">Legend-1 Range</a></li>
                                    <li><a href="product/101.html">Busch Range</a></li>
                                    <li><a href="product/102.html">Classy Range</a></li>
                                    <li><a href="product/99.html">Aura Range</a></li>
                                    <li><a href="product/109.html">Unique Range</a></li>
                                    <li><a href="product/117.html">Sonia Range</a></li>
                                    <li><a href="product/119.html">Ultraflat range</a></li>
                                    <li><a href="product/116.html">Duro Range</a></li>
                                    <li><a href="product/115.html">Metal Clad</a></li>
                                </ul>
                            </li>-->

                            <!--<li><a href="product/85.html">Lampholder</a>
                                <ul>
                                    <li><a href="product/110.html">Drop</a></li>
                                    <li><a href="product/111.html">Straight</a></li>
                                    <li><a href="product/112.html">Angled</a></li>
                                </ul>
                            </li>-->
                            <!--
                            <li><a href="product/86.html">Doorbell</a></li>
                            <li><a href="product/87.html">Automatic Voltage Switcher</a></li>
                            <li><a href="product/88.html">Ceiling Rose</a></li>
                            <li><a href="product/89.html">Mounting box</a></li>
                            <li><a href="product/92.html">Plug/Adaptor</a></li>
                            <li><a href="product/93.html">Extension</a></li>
                            <li><a href="product/94.html">Circuit breaker</a></li>
                            <li><a href="product/96.html">Change over switch</a></li>
                            <li><a href="product/97.html">Distribution box</a></li>
                            <li><a href="product/113.html">Junction Box</a></li>
                            <li><a href="product/118.html">Others</a></li>
                            <li><a href="product/114.html">LED Bulb</a> </li>-->
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
                    <dd><h2>About Us</h2><a href="about/about-82.html"></a></dd>
                </dl>
                <dl class="index_pic">
                    <dt><img src="assets/templates/youda/images/pic_02.png"></dt>
                    <dd><h2>Contact us</h2><a href="contact.html"></a></dd>
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

                    <dl style="margin-left:0px;">
                        <a href="showproduct/show-1022.html">
                            <dt>
                                <p><img src="assets/upload/201902/18/201902181339584050.jpg"></p>
                            </dt>
                            <dd>1 gang switch with metal b…</dd>
                        </a>
                    </dl>

                    <dl>
                        <a href="showproduct/show-1020.html">
                            <dt>
                                <p><img src="assets/upload/201902/18/201902181138537426.jpg"></p>
                            </dt>
                            <dd>13A adaptor</dd>
                        </a>
                    </dl>

                    <dl>
                        <a href="showproduct/show-992.html">
                            <dt>
                                <p><img src="assets/upload/201902/18/201902180929179385.jpg"></p>
                            </dt>
                            <dd>1 gang switch</dd>
                        </a>
                    </dl>

                    <dl>
                        <a href="showproduct/show-634.html">
                            <dt>
                                <p><img src="assets/upload/201611/07/201611071141335212.jpg"></p>
                            </dt>
                            <dd>1 gang switch</dd>
                        </a>
                    </dl>

                    <dl style="margin-left:0px;">
                        <a href="showproduct/show-596.html">
                            <dt>
                                <p><img src="assets/upload/201611/02/201611021503301590.jpg"></p>
                            </dt>
                            <dd>B22 straight lampholder</dd>
                        </a>
                    </dl>

                    <dl>
                        <a href="showproduct/show-536.html">
                            <dt>
                                <p><img src="assets/upload/201611/05/201611050906231958.png"></p>
                            </dt>
                            <dd>1 gang switch</dd>
                        </a>
                    </dl>

                    <dl>
                        <a href="showproduct/show-668.html">
                            <dt>
                                <p><img src="assets/upload/201701/05/201701051525599012.jpg"></p>
                            </dt>
                            <dd>13A switched socket</dd>
                        </a>
                    </dl>

                    <dl>
                        <a href="showproduct/show-712.html">
                            <dt>
                                <p><img src="assets/upload/201611/12/201611120929492904.jpg"></p>
                            </dt>
                            <dd>2-4 Way Distribution Box</dd>
                        </a>
                    </dl>

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