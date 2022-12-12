<?php include('includes/config.php');?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/templates/youda/css/otherpage.css">
    <title>Ann Electric - About Us</title>
    <meta name="keywords" content="Ann Electric">
    <meta name="description" content="Ann Electric">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="templates/youda/js/jquery-1.7.2.min.js"></script>
	
	<!--<script type="text/javascript">
		$(document).ready(function() {
			$('.flexslider').flexslider({
				directionNav: true,
				pauseOnAction: false
			});
		});
	</script>-->

	<style type="text/css">
		.menu_box a.selected_b {
			color: #fff !important;
			background: #0d6cac
		}
	</style>

	<script type="text/javascript" charset="utf-8" src="assets/templates/youda/js/common.js"></script>
</head>

<body>
	<div class="container">
		<!--Header-->
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
		
		<div class="clear"></div>

		<!--Header-->
		<?php include('includes/header.php'); ?>
		<!--/Header-->

		<div class="pic_box"><img src="assets/templates/youda/images/pic_09.png"></div>
		<div class="content">
			<div class="center">
				<div class="title_box">
					<dl>
						<dt>ABOUT US</dt>
						<dd>Better Ann Better Electric</dd>
					</dl>
				</div>
				<div class="about">
					<p>Ann Electric is a specialized enterprise in researching, 
						manufacturing and sale electrical products located in Binhai area,
						Wenzhou Economic-Technological Development Zone.We are the member of China Mechanical and 
						electrical products import and export chamber of commerce; 
						A-level management enterprise in Chinese Customs' List of reputation management .
						Our goods has been exported to more than 20 countries and regions in ASEAN,Africa,
						Europe and middle east.Our brand "MG" won good reputation in the related market. 
					</p>
					<p>
						Our high quality research,management and technical team are oriented to comprehensive quality management.
						By strictly carrying out standards of ISO9001:2008 international quality management system and 5S management,
						our goods various technical performance indexes meet the requirement of domestic and international standards. 
						We obtain SONCAP,TBS,CE certificate for product access qualification certificate. 
						In 2013 we obtain a patent for electric products package design awarded by China's State Intellectual Property Office.
						In 2014,it won Utility Model Patent Certificate.
						Our aboratory room under construction would be the most perfect one in 
						the line of electrical accessories used in civil architecture.
					</p>
					<p>
						<img alt="" src="assets/upload/201610/22/201610220849224922.png">
					</p>
					<p>
						We have developed more than 10 series (200 specifications )switch and sockets;
						more than 100 specifications of lamp holder and junction box;
						also related products including ventilator,insulating tape,LED light, energy saving lamp, 
						knife switch,extension socket,breakers and consumer unit etc.
						And annual foreign exchange earnings reaches to more than $7 million. 
						And we offer One-Stop Service for solution of engineering and household electric.
					</p>
					<p>
						With the tenet of reasonable price,effective production time and good After-sales 
						service and policy of unity ,Diligence,objectivity,innovation we can offer the best 
						quality products and perfect service.
						<img alt="" src="assets/upload/201611/08/201611081541164986.jpg">
						<img alt="" src="assets/upload/201611/08/201611081541324536.jpg">
						<img alt="" src="assets/upload/201611/08/201611081541402982.jpg">
					</p>
				</div>
			</div>

		</div>

		<div class="clear"></div>

		<!--footer-->
		<?php include('includes/footer.php'); ?>
		<!--/footer-->
	</div>

	<script type="text/javascript" src="assets/pagead/f.txt"></script>
	<noscript>
		<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="assets/pagead/viewthroughconversion/871990639/index.htm.gif?guid=ON&amp;script=0">
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