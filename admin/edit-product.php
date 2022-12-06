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
		$detimage = $_FILES["img4"]["name"];
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/productimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/productimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/productimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/productimages/" . $_FILES["img4"]["name"]);

        #Insert form data into database tbllaptops.
		$sql = "update tblproducts
                set PartNo=:partnumber,ProductName=:productname,Category=:category,SubCategory=:subcategory,Description=:productdescription,Pack=:pack,
		        Image1=:image1,Image2=:image2,Image3=:image3,DetImage=:detimage ";

		$query = $dbh->prepare($sql);
		$query->bindParam(':partnumber', $partNumber, PDO::PARAM_STR);
		$query->bindParam(':productname', $productName, PDO::PARAM_STR);
		$query->bindParam(':category', $category, PDO::PARAM_STR);
		$query->bindParam(':subcategory', $subCategory, PDO::PARAM_STR);
		$query->bindParam(':productdescription', $productDescription, PDO::PARAM_STR);
		$query->bindParam(':pack', $pack, PDO::PARAM_STR);
		$query->bindParam(':image1', $image1, PDO::PARAM_STR);
		$query->bindParam(':image2', $image2, PDO::PARAM_STR);
		$query->bindParam(':image3', $image3, PDO::PARAM_STR);
		$query->bindParam(':detimage', $detimage, PDO::PARAM_STR);
		$query->execute();

		$msg = "Product edited succesfully";
		
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

		<title>Ann Electric | Admin Edit Product</title>

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

							<h2 class="page-title">Edit Product</h2>

							<div class="row">
								<div class="col-md-10">
									<div class="panel panel-default" style="overflow: inherit !important;">
										<div class="panel-heading">Basic Info</div>
										<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

										<div class="panel-body">
										    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                            <?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                                            <?php
                                            $id = intval($GET['id']);
                                            $sql = "SELECT tblproducts.*tblcategory.CategoryName,tblcategory.id as cid, tblsubcategory.SubCategory, tblsubcategory.id as scid from tblproducts
                                                    join tblcategory on tblcategory.id=tblproducts.Category 
                                                    join tblsubcategory on tblsubcategory.id=tblproducts.SubCategory 
                                                    where tblproducts.id=:id";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':id', $id,PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;

                                            if($query->rowCount() > 0){
                                                foreach ($results as $result){ ?>
                                            
											    
											    	<div class="form-group">
											    		<label class="col-sm-2 control-label">PartNo<span style="color: red;">*</span></label>
											    		<div class="col-sm-4">
											    			<input type="text" name="partnumber" class="form-control" value="<?php echo htmlentities($result->PartNo); ?>" required>
											    		</div>
    
											    		<label class="col-sm-2 control-label">ProductName<span style="color: red;">*</span></label>
											    		<div class="col-sm-4">
											    			<input type="text" name="productname" class="form-control" value="<?php echo htmlentities($result->ProductName); ?>" required>
											    		</div>
											    	</div>
    
											    	<div class="hr-dashed"></div>
    
											    	<div class="form-group">
											    		
											    		<label class="col-sm-2 control-label">Select Category<span style="color: red;">*</span></label>
											    		<div class="col-sm-4">
											    			<select class="formselect" name="category" required>
											    				<option value="<?php echo htmlentities($result->cid)?>"><?php echo htmlentities($catname = $result->CategoryName);?></option>
											    				<?php
											    				# $ret = "select id, ParentId, CategoryName from tblcategory where ParentId = 0";
											    				$ret = "select id, CategoryName from tblcategory";
											    				$query = $dbh->prepare($ret);
											    				$query->execute();
											    				$resultss = $query->fetchAll(PDO::FETCH_OBJ);
											    				if ($query->rowCount()>0){
											    					foreach ($resultss as $results){ 
																		if ($results->CategoryName == $catname){
																			continue;
																		} else {?>
                                                                            <option value="<?php echo htmlentities($result->id)?>"><?php echo htmlentities($result->CategoryName);?></option>
																		<?php }
																		?>
											    					<?php 
											    					}
											    				}
											    				
											    				?>
											    			</select>
											    		</div>
    
											    		<label class="col-sm-2 control-label">Select SubCategory<span style="color: red;">*</span></label>
											    		<div class="col-sm-4">
											    			<select class="formselect" name="subcategory" required>
											    				<option value="<?php echo htmlentities($result->id)?>"><?php echo htmlentities($result->SubCategory);?></option>
											    				<?php
											    				$ret = "select id, SubCategory from tblsubcategory";
											    				$query = $dbh->prepare($ret);
											    				$query->execute();
											    				$results = $query->fetchAll(PDO::FETCH_OBJ);
											    				if ($query->rowCount()>0){
											    					foreach ($resultss as $results){ 
																		if ($results->CategoryName == $catname){
																			continue;
																		} else {?>
                                                                            <option value="<?php echo htmlentities($results->id)?>"><?php echo htmlentities($result->CategoryName);?></option>
																		<?php }
																		?>
											    					<?php 
											    					}
											    				}
											    				
											    				?>
											    			</select>
											    		</div>
											    	</div>
    
											    	<div class="hr-dashed"></div>
    
											    	<div class="form-group">
											    		<label class="col-sm-2 control-label">Product Description<span style="color: red;">*</span></label>
											    		<div class="col-sm-10">
											    		    <textarea class="form-control" name="productdescription" rows="3" value="<?php echo htmlentities($result->Description); ?>"required></textarea>
											    		</div>
											    	</div>
    
											    	<div class="form-group">
											    	    <label class="col-sm-2 control-label">Pack<span style="color: red;">*</span></label>
											    		<div class="col-sm-4">
											    			<input type="text" name="pack" class="form-control" value="<?php echo htmlentities($result->Pack); ?>" required>
											    		</div>
											    	</div>
    
											    	<div class="hr-dashed"></div>
    
											    	<div class="form-group">
											    		<div class="col-sm-12">
											    			<h4><b>Product Images</b></h4>
											    		</div>
											    	</div>
    
											    	<div class="form-group">
                                                        <div class="col-sm-4">
															Image 1 <img src="img/productimages/<?php echo htmlentities($result->Image1); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 1</a>
														</div>

														<div class="col-sm-4">
															Image 2<img src="img/productimages/<?php echo htmlentities($result->Image2); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 2</a>
														</div>

														<div class="col-sm-4">
															Image 3<img src="img/productimages/<?php echo htmlentities($result->Image3); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 3</a>
														</div>
											    	</div>
    
											    	<div class="form-group">
														<div class="col-sm-4">
															Image 4<img src="img/productimages/<?php echo htmlentities($result->DetImage); ?>" width="300" height="200" style="border:solid 1px #000">
															<a href="changedetailimage.php?imgid=<?php echo htmlentities($result->id) ?>">Change Description Image</a>
														</div>
													</div>
                                                    
											    	<div class="hr-dashed"></div>

                                                    <div class="form-group">
												        <div class="col-sm-8 col-sm-offset-2">
													        <button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
												        </div>
											        </div>
    
											    
                                                <?php
                                                }
                                            }
                                            ?>
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