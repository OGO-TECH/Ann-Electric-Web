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
		$brand = $_POST['brandname'];
		$productDescription= $_POST['productdescription'];
		$pack = $_POST['pack'];
		$image1 = $_FILES["img1"]["name"];
		$image2 = $_FILES["img2"]["name"];
		$image3 = $_FILES["img3"]["name"];
		$detimage = $_FILES["img4"]["name"];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/productimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/productimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/productimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/productimages/" . $_FILES["img4"]["name"]);

        #Insert form data into database tbllaptops.
		$sql = "INSERT INTO tblproducts(PartNo,ProductName,Category,SubCategory,Brand,Description,Pack,
		        Image1,Image2,Image3,DetImage) 
		        VALUES(:partnumber,:productname,:category,:subcategory,:brand,:productdescription,:pack,
				:image1,:image2,:image3,:detimage)";

		$query = $dbh->prepare($sql);
		$query->bindParam(':partnumber', $partNumber, PDO::PARAM_STR);
		$query->bindParam(':productname', $productName, PDO::PARAM_STR);
		$query->bindParam(':category', $category, PDO::PARAM_STR);
		$query->bindParam(':subcategory', $subCategory, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':productdescription', $productDescription, PDO::PARAM_STR);
		$query->bindParam(':pack', $pack, PDO::PARAM_STR);
		$query->bindParam(':image1', $image1, PDO::PARAM_STR);
		$query->bindParam(':image2', $image2, PDO::PARAM_STR);
		$query->bindParam(':image3', $image3, PDO::PARAM_STR);
		$query->bindParam(':detimage', $detimage, PDO::PARAM_STR);
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
									<div class="panel panel-default" style="overflow: inherit !important;">
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
															$cats = $dbh->prepare("SELECT id, parent_id, CategoryName from category where parent_id = 0");
															$cats->execute();
															$categories = $cats->fetchAll(PDO::FETCH_OBJ);
															if ($cats->rowCount()>0){
																foreach ($categories as $category){ ?>
																<option value="<?php echo htmlentities($category->id)?>"><?php echo htmlentities($category->CategoryName);?></option>
																<?php 
																}
															}
															?>
														</select>
													</div>
													<label class="col-sm-2 control-label">Select SubCategory</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="subcategory">
															<option value="">Select</option>
															<?php
															$subcats = $dbh->prepare("SELECT id,parent_id,CategoryName from category where parent_id != 0 ORDER BY parent_id");
															$subcats->execute();
															$subcategories = $subcats->fetchAll(PDO::FETCH_OBJ);
															if ($subcats->rowCount()>0){
																foreach ($subcategories as $subcategory){ ?>
																<option value="<?php echo htmlentities($subcategory->id)?>"><?php echo htmlentities($subcategory->CategoryName);?></option>
																<?php }
															}
														
															?>
														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>

												<div class="form-group">
												    <label class="col-sm-2 control-label">Pack<span style="color: red;">*</span></label>
													<div class="col-sm-4">
														<input type="text" name="pack" class="form-control" required>
													</div>

													<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
													<div class="col-sm-4">
														<select class="selectpicker" name="brandname" required>
															<option value=""> Select </option>
															<?php 
															$brandquery = $dbh->prepare("select id,BrandName from tblbrand");
															$brandquery->execute();
															$brands = $brandquery->fetchAll(PDO::FETCH_OBJ);
															if ($brandquery->rowCount() > 0) {
																foreach ($brands as $brand) {
															?>
																<option value="<?php echo htmlentities($brand->id); ?>"><?php echo htmlentities($brand->BrandName); ?></option>
															<?php }
															} ?>

														</select>
													</div>
												</div>

												<div class="hr-dashed"></div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Product Description<span style="color: red;">*</span></label>
													<div class="col-sm-10">
													    <textarea class="form-control" name="productdescription" rows="3" required></textarea>
													</div>
												</div>

												<div class="hr-dashed"></div>

												<div class="form-group">
													<div class="col-sm-12">
														<h4><b>Upload Images</b></h4>
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-4">
														Image 1 <span style="color:red">*</span><input type="file" name="img1"required>
													</div>
													<div class="col-sm-4">
														Image 2<input type="file" name="img2">
													</div>
													<div class="col-sm-4">
														Image 3<input type="file" name="img3">
													</div>
												</div>

												<div class="hr-dashed"></div>

												<div class="form-group">
													<div class="col-sm-4">
														Description Image<input type="file" name="img4">
													</div>
												</div>

												<div class="hr-dashed"></div>

												<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" style="margin-left: 41.66666667%;width: 41.66666667%;">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save Info</button>
												</div>

											</div>

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