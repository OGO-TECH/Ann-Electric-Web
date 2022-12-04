<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
    # Assign form input with variables.
	if (isset($_POST['submit'])) {
		$serialnumber = $_POST['serialnumber'];
		$emailid = $_POST['emailid'];
		$laptoptitle = $_POST['laptoptitle'];
		$brand = $_POST['brandname'];
		$laptopoverview = $_POST['laptoporcview'];
		$priceperday = $_POST['priceperday'];
		$processor = $_POST['processor'];
		$storage = $_POST['storage'];
		$ram = $_POST['ram'];
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$charger = $_POST['charger'];
		$bag = $_POST['bag'];
		$mouse = $_POST['mouse'];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/laptopimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/laptopimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/laptopimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/laptopimages/" . $_FILES["img4"]["name"]);

        #Insert form data into database tbllaptops.
		$sql = "INSERT INTO tbllaptops(SerialNumber,OwnerEmail,LaptopTitle,LaptopBrand,LaptopOverview,PricePerDay,Processor,
		        Storage,RAM,Vimage1,Vimage2,Vimage3,Vimage4,Charger,Bag,Mouse) 
		        VALUES(:serialnumber,:email,:laptoptitle,:brand,:laptopoverview,:priceperday,:processor,
				:storage,:ram,:vimage1,:vimage2,:vimage3,:vimage4,:charger,:bag,:mouse)";

		$query = $dbh->prepare($sql);
		$query->bindParam(':serialnumber', $serialnumber, PDO::PARAM_STR);
		$query->bindParam(':email', $emailid, PDO::PARAM_STR);
		$query->bindParam(':laptoptitle', $laptoptitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':laptopoverview', $laptopoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':processor', $processor, PDO::PARAM_STR);
		$query->bindParam(':storage', $storage, PDO::PARAM_STR);
		$query->bindParam(':ram', $ram, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':charger', $charger, PDO::PARAM_STR);
		$query->bindParam(':bag', $bag, PDO::PARAM_STR);
		$query->bindParam(':mouse', $mouse, PDO::PARAM_STR);
		$query->execute();

		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Laptop posted successfully";
		} else {
			$error = "Something went wrong. Please try again";
		}
	}

?>

	<!DOCTYPE html>
	<html lang="en" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Geofrey Obara">
		<meta name="theme-color" content="#3e454c">

		<title>Ann Electric | Admin Add Product</title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<!-- Bootstrap social button library -->
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<!-- Bootstrap select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Bootstrap file input -->
		<link rel="stylesheet" href="css/fileinput.min.css">
		<!-- Awesome Bootstrap checkbox -->
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<!-- Admin Stye -->
		<link rel="stylesheet" href="css/style.css">
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>

	</head>

	<body>

		<?php include('includes/header.php'); ?>
		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Add a Product</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Basic Info</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                      
            </div>
        </div>
		<!-- Loading Scripts -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>