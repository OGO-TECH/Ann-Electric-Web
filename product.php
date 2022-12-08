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
                        "background": "url(/templates/youda/images/bg_08.png) no-repeat left center"
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
                    <div class="product_nav">

                        <dl>
                            <dt><a href="javascript:;" class="flip">Switches&amp;Sockets</a></dt>
                            <dd class="panel">
                                <a href="product/108.html">— Luxury Range</a>
                                <a href="product/107.html">— MG Range</a>
                                <a href="product/105.html">— Ivory Range</a>
                                <a href="product/98.html">— Alpha Range</a>
                                <a href="product/100.html">— Lavina Range</a>
                                <a href="product/104.html">— Legend E Range</a>
                                <a href="product/103.html">— Elegance Range</a>
                                <a href="product/106.html">— Legend-1 Range</a>
                                <a href="product/101.html">— Busch Range</a>
                                <a href="product/102.html">— Classy Range</a>
                                <a href="product/99.html">— Aura Range</a>
                                <a href="product/109.html">— Unique Range</a>
                                <a href="product/117.html">— Sonia Range</a>
                                <a href="product/119.html">— Ultraflat range</a>
                                <a href="product/116.html">— Duro Range</a>
                                <a href="product/115.html">— Metal Clad</a>
                            </dd>
                        </dl>

                        <dl>
                            <dt><a href="javascript:;" class="flip">Lampholder</a></dt>
                            <dd class="panel">
                                <a href="product/110.html">— Drop</a>
                                <a href="product/111.html">— Straight</a>
                                <a href="product/112.html">— Angled</a>
                            </dd>
                        </dl>

                        <dl><dt><a href="product/86.html">Doorbell</a></dt></dl>
                        <dl><dt><a href="product/87.html">Automatic Voltage Switcher</a></dt></dl>
                        <dl><dt><a href="product/88.html">Ceiling Rose</a></dt></dl>
                        <dl><dt><a href="product/89.html">Mounting box</a></dt></dl>
                        <dl><dt><a href="product/92.html">Plug/Adaptor</a></dt></dl>
                        <dl><dt><a href="product/93.html">Extension</a></dt></dl>
                        <dl><dt><a href="product/94.html">Circuit breaker</a></dt></dl>
                        <dl><dt><a href="product/96.html">Change over switch</a></dt></dl>
                        <dl><dt><a href="product/97.html">Distribution box</a></dt></dl>
                        <dl><dt><a href="product/113.html">Junction Box</a></dt> </dl>
                        <dl><dt><a href="product/118.html">Others</a></dt></dl>
                        <dl><dt><a href="product/114.html">LED Bulb</a></dt></dl>


                    </div>
                    <div class="product_right">
                        <div class="product_list">
                            <!--DataTable-->

                            <dl>
                                <a href="showproduct/show-1022.html">
                                    <dt><p><img src="upload/201902/18/201902181339584050.jpg"></p></dt>
                                    <dd>1 gang switch with metal b…</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-1021.html">
                                    <dt><p><img src="upload/201902/18/201902181328467643.jpg"></p></dt>
                                    <dd>UK/US/EU Wifi-socket plug</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-1020.html">
                                    <dt><p><img src="upload/201902/18/201902181138537426.jpg"></p></dt>
                                    <dd>13A adaptor</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-992.html">
                                    <dt><p><img src="upload/201902/18/201902180929179385.jpg"></p></dt>
                                    <dd>1 gang switch</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-950.html">
                                    <dt><p><img src="upload/201704/20/201704200852485472.jpg"></p></dt>
                                    <dd>1 gang switch</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-937.html">
                                    <dt><p><img src="upload/201704/19/201704190958323480.jpg"></p></dt>
                                    <dd>1 gang switch</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-913.html">
                                    <dt><p><img src="upload/201708/13/201708131017222094.png"></p></dt>
                                    <dd>DIN Size Cabinets</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-889.html">
                                    <dt><p><img src="upload/201706/20/201706201440397256.png"></p></dt>
                                    <dd>LED Bulb 5W</dd>
                                </a>
                            </dl>

                            <dl>
                                <a href="showproduct/show-844.html">
                                    <dt><p><img src="upload/201611/19/201611191329437200.jpg"></p></dt>
                                    <dd>13A Fused plug</dd>
                                </a>
                            </dl>

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