<?php 
// Include the database config file 
include_once('includes/config.php');
 
if(!empty($_POST["id"])){ 
    // Fetch subcategory data based on the specific category 
    $categoryId = $_POST["id"];
    $subcats = $dbh->prepare("SELECT id as scid, parent_id, CategoryName from category where Parent_Id =:id");
    $subcats->bindParam(':id', $categoryId,PDO::PARAM_STR);
    $subcats->execute();
    $subcategories = $subcats->fetchAll(PDO::FETCH_OBJ);
     
    // Generate HTML of subcategory options list 
    if($subcats->rowCount()> 0){ 
           echo'<option value ="">Select Subcategory</option>';
           foreach($subcategories as $subcategory){
                echo'<option value="$subcategory->scid">$subcategory->CategoryName</option>';
           }
        }
    }

?>