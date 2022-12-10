
<div class="header">
    <div class="center">
        <div class="logo"><a href="index.php"><img src="assets/templates/youda/images/logo_01.png" style="width:240px;height:97px;"></a></div>
        <div class="menu_box" id="menu-wrap">
            <ul id="menu">
                <li><a href="index.php" class="selected_a">HOME</a></li>
                <li><a href="about.php" class="selected_b">ABOUT US</a></li>
                <li><a href="#" class="selected_d">PRODUCTS</a>
                    
                    <?php
                    # Query db for categories.
                    $sql = "SELECT * from category where parent_id = 0;";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if($query->rowCount()>0){ ?>
                        <ul>
                            <?php foreach ($results as $result){
                                $catid = $result->id;
                                $subcategory = $dbh->prepare('SELECT * from category where parent_id = ?');
                                $subcategory->execute([$catid]);
                                $children = $subcategory->fetchAll(PDO::FETCH_OBJ);?>
    
                                <li><a href="categories.php?cid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></a>
                                    <?php if($subcategory->rowCount()>0){?>
                                        <ul>
                                            <?php foreach($children as $child){?>
                                            <li><a href="subcategories.php?scid=<?php echo htmlentities($child->id);?>"><?php echo htmlentities($child->CategoryName);?></a></li> 
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                           <?php } ?>
                       </ul>
                    <?php }?>  
                    
                </li>
                <li><a href="contact.php" class="selected_e">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</div>