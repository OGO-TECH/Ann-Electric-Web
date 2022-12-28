<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	# Delete Category

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$sql = "delete from tblproducts  WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$msg = "Product Deleted Succesfully!";
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

		<title>Ann Electric |Admin Manage product </title>

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

							<h2 class="page-title">Manage Products</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								<div class="panel-heading">Listed Products</div>
								<div class="panel-body">
									<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
									<?php
									$sql = "SELECT id, parent_id, CategoryName FROM category where parent_id IS NULL";
									$query = $dbh->prepare($sql);
									$query->execute();
                                    $categories = $query->fetchAll(PDO::FETCH_OBJ);

									if($query->rowCount()> 0){?>
										<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<?php foreach($categories as $category){?>
											<thead>
											<tr style="color: #76c1d5;"><th style="font-size: 1.8em;text-align: center;"colspan="8"><?php echo htmlentities($category->CategoryName)?></th></tr>	
											<tr>
												<th>#</th>
                                                <th>PartNo</th>
												<th>Product Name</th>
												<th>Brand</th>
												<th>SubCategory</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										    </thead>
											<?php 
											$category = ($category->id);
											$sql = "SELECT tblproducts.id,tblproducts.PartNo,tblproducts.ProductName,tblproducts.Category,tblproducts.SubCategory,
											        tblproducts.Description,category.id as cid,category.CategoryName,category.parent_id as scid, tblbrand.id as bid, tblbrand.BrandName
												    from  tblproducts 
													join tblbrand on tblbrand.id = tblproducts.Brand
												    join category on category.id = tblproducts.SubCategory
												    where tblproducts.Category = :category;";
											$query = $dbh->prepare($sql);
											$query->bindParam(':category',$category,PDO::PARAM_STR);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {				?>
											<tr>
												<td><?php echo htmlentities($cnt); ?></td>
												<td><?php echo htmlentities($result->PartNo); ?></td>
                                                <td><?php echo htmlentities($result->ProductName); ?></td>
												<td><?php echo htmlentities($result->BrandName); ?></td>
												<td><?php echo htmlentities($result->CategoryName); ?></td>
												<td><?php echo htmlentities($result->Description); ?></td>
												<td>
													<a href="edit-product.php?id=<?php echo $result->id; ?>" class="btn btn-primary" style="line-height: 10px;">Edit</a>&nbsp;&nbsp;
													<a href="manage-products.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete this product?');" class="btn btn-primary" style="background-color: #e53131;line-height: 10px">Delete</a>
												</td>
											</tr>
											<?php $cnt = $cnt + 1;
												}
											} ?>
										    <tbody>
										    </tbody>
										<?php }?>
										</table>
									<?php }
									?>
										<tbody>
											

										</tbody>
									</table>
								</div>
								<div class="addcat" style="text-align:center; margin-bottom: 30px;">
									<a href="add-product.php" class="btn btn-primary">Add a Product</a>
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