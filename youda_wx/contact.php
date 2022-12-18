<?php include('includes/config.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact us - Ann Electric</title>
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
    <style>
        .my-map {
            margin: 0 auto;
            width: 100%;
            height: 100%;
        }

        .my-map .icon {
            background: url(../../lbs.amap.com/console/public/show/marker.html) no-repeat;
        }

        .my-map .icon-cir {
            height: 31px;
            width: 28px;
        }

        .my-map .icon-cir-red {
            background-position: -11px -5px;
        }

        .amap-container {
            height: 100%;
        }
    </style>
    <script type="text/javascript">
        $(function() {


            var infoWindow, map, level = 12,
                center = {
                    lng: 120.798356,
                    lat: 27.842727
                },
                features = [{
                    type: "Marker",
                    name: "Wenzhou youda electric co.,ltd",
                    desc: "Bldg.5, Block B603, No.14 Road,(Near Dingxiang Road), Binhai Area, Wenzhou Economic & Technological Development Zone, China.<br />Tel: 0577-88900373",
                    color: "red",
                    icon: "cir",
                    offset: {
                        x: -9,
                        y: -31
                    },
                    lnglat: {
                        lng: 120.798356,
                        lat: 27.842727
                    }
                }];

            function loadFeatures() {
                for (var feature, data, i = 0, len = features.length, j, jl, path; i < len; i++) {
                    data = features[i];
                    switch (data.type) {
                        case "Marker":
                            feature = new AMap.Marker({
                                map: map,
                                position: new AMap.LngLat(data.lnglat.lng, data.lnglat.lat),
                                zIndex: 3,
                                extData: data,
                                offset: new AMap.Pixel(data.offset.x, data.offset.y),
                                title: data.name,
                                content: '<div class="icon icon-' + data.icon + ' icon-' + data.icon + '-' + data.color + '"></div>'
                            });
                            break;
                        case "Polyline":
                            for (j = 0, jl = data.lnglat.length, path = []; j < jl; j++) {
                                path.push(new AMap.LngLat(data.lnglat[j].lng, data.lnglat[j].lat));
                            }
                            feature = new AMap.Polyline({
                                map: map,
                                path: path,
                                extData: data,
                                zIndex: 2,
                                strokeWeight: data.strokeWeight,
                                strokeColor: data.strokeColor,
                                strokeOpacity: data.strokeOpacity
                            });
                            break;
                        case "Polygon":
                            for (j = 0, jl = data.lnglat.length, path = []; j < jl; j++) {
                                path.push(new AMap.LngLat(data.lnglat[j].lng, data.lnglat[j].lat));
                            }
                            feature = new AMap.Polygon({
                                map: map,
                                path: path,
                                extData: data,
                                zIndex: 1,
                                strokeWeight: data.strokeWeight,
                                strokeColor: data.strokeColor,
                                strokeOpacity: data.strokeOpacity,
                                fillColor: data.fillColor,
                                fillOpacity: data.fillOpacity
                            });
                            break;
                        default:
                            feature = null;
                    }
                    if (feature) {
                        AMap.event.addListener(feature, "click", mapFeatureClick);
                    }
                }
            }

            function mapFeatureClick(e) {
                if (!infoWindow) {
                    infoWindow = new AMap.InfoWindow({
                        autoMove: true
                    });
                }
                var extData = e.target.getExtData();
                infoWindow.setContent("<h5>" + extData.name + "</h5><div>" + extData.desc + "</div>");
                infoWindow.open(map, e.lnglat);
            }

            map = new AMap.Map("mapContainer", {
                center: new AMap.LngLat(center.lng, center.lat),
                level: level,
                lang: 'en'
            });

            loadFeatures();

            map.on('complete', function() {
                map.plugin(["AMap.ToolBar", "AMap.Scale"], function() {
                    map.addControl(new AMap.ToolBar);

                    map.addControl(new AMap.Scale);
                });
            })
        });
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
            <div class="contact">
                <div class="map">
                    <div id="wrap" class="my-map">
                        <div id="mapContainer"></div>
                    </div>
                    <script src="http://webapi.amap.com/maps?v=1.3&amp;key=8325164e247e15eea68b59e89200988b"></script>
                </div>
                <div class="contact_content">
                    <ul>
                        <li>
                            <p style="background:url(assets/images/icon_03.png) no-repeat left center;">Customer Care:0086 577 88900373</p>
                        </li>
                        <li>
                            <p style="background:url(assets/images/icon_04.png) no-repeat left 33px;">Fax:0086 577 88900373</p>
                        </li>
                        <li>
                            <p style="background:url(assets/images/icon_05.png) no-repeat left 33px;">Address:Bldg.5, Block B603, No.14 Road,(Near Dingxiang Road), Binhai Area, Wenzhou Economic & Technological Development Zone, China.</p>
                        </li>
                        <li>
                            <p style="background:url(assets/images/icon_06.png) no-repeat left 33px;">Email : <a href="mailto:youda@youda.cc">mail@annelectric.co.ke</a></p>
                        </li>
                    </ul>
                </div>
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