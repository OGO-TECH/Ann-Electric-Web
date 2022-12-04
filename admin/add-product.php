<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
    # Assign form input with variables.
	if (isset($_POST['submit'])) {
		$partNumber = $_POST['partnumber'];
		$productName = $_POST['productname'];
		$category = $_POST['category'];
		$subCategory = $_POST['subcategory'];
		$productDescription= $_POST['productdescription'];
		$pack = $_POST['pack'];
		$image1 = $_FILES["img1"]["name"];
		$image2 = $_FILES["img2"]["name"];
		$image3 = $_FILES["img3"]["name"];
		$detimage4 = $_FILES["img4"]["name"];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/productimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/productimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/productimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/productimages/" . $_FILES["img4"]["name"]);

        #Insert form data into database tbllaptops.
		$sql = "INSERT INTO tblproducts(PartNo.,ProductName,Category,SubCategory,Description,Pack,
		        Image1,Image2,Image3,DetImage) 
		        VALUES(:partnumber,:productname,:category,:subcategory,:productdescription,:pack,
				:image1,:image2,:image3,:detimage)";

		$query = $dbh->prepare($sql);
		$query->bindParam(':partnumber', $partnumber, PDO::PARAM_STR);
		$query->bindParam(':productname', $productnameid, PDO::PARAM_STR);
		$query->bindParam(':category', $category, PDO::PARAM_STR);
		$query->bindParam(':subcategory', $subcategory, PDO::PARAM_STR);
		$query->bindParam(':productdescription', $productdescription, PDO::PARAM_STR);
		$query->bindParam(':pack', $pack, PDO::PARAM_STR);
		$query->bindParam(':image1', $image1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $image2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $image3, PDO::PARAM_STR);
		$query->bindParam(':detimage4', $detimage4, PDO::PARAM_STR);
		$query->execute();

		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Product added succesfully";
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
										<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

										<div class="panel-body">
											<form method="post" class="form-horizontal" enctype="multipart/form-data">
												<div class="form-group">
													<label class="col-sm-2 control-label">PartNo<span style="color: red;">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="partnumber" class="form-control" required>
													</div>

													<label class="col-sm-2 control-label">ProductName<span style="color: red;">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="productname" class="form-control" required>
													</div>
												</div>

												<div class="hr-dashed"></div>

												<div class="form-group">
													
													<label class="col-sm-2 control-label">Select Category<span style="color: red;">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="category" required>
															<option value="">Select</option>
															<?php
															# $ret = "select id, ParentId, CategoryName from tblcategory where ParentId = 0";
															$ret = "select id, CategoryName from tblcategory";
															$query = $dbh->prepare($ret);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															if ($query->rowCount()>0){
																foreach ($results as $result){ ?>
																<option value="<?php echo htmlentities($result->id)?>" onchange=""><?php echo htmlentities($result->CategoryName);?></option>
																<?php 
																$cat = ($result->CategoryName);
																}
															}
															
															?>
														</select>
													</div>

													<label class="col-sm-2 control-label">Select SubCategory<span style="color: red;">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="subcategory" required>
															<option value="">Select</option>
															<?php
															$ret = "select id, CategoryName from tblcategory";
															$query = $dbh->prepare($ret);
															$query->execute();
															$results = $query->fetchAll(PDO::FETCH_OBJ);
															if ($query->rowCount()>0){
																foreach ($results as $result){ ?>
																<option value="<?php echo htmlentities($result->id)?>"><?php echo htmlentities($result->CategoryName);?></option>
																<?php }
															}
															?>
														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>

											</form>
										</div>
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