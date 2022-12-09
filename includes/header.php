
<div class="header">
    <div class="center">
        <div class="logo"><a href="index.php"><img src="assets/templates/youda/images/logo_01.png" style="width:240px;height:97px;"></a></div>
        <div class="menu_box" id="menu-wrap">
            <ul id="menu">
                <li><a href="index.php" class="selected_a">HOME</a></li>
                <li><a href="about.php" class="selected_b">ABOUT US</a></li>
                <li><a href="product.php" class="selected_d">PRODUCTS</a>
                    
                    <ul>
                        <?php
                        $sql = "SELECT * from category where parent_id = 0;";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
    
                        if($query->rowCount()>0){
                            foreach ($results as $result){?>
                                <li><a href="#"><?php echo htmlentities($result->CategoryName);?></a>
                                    <ul>
                                    <?php
                                    $catid = $result->id;
                                    $subcategory = $dbh->prepare('SELECT * from category where parent_id = ?');
                                    $subcategory->execute([$catid]);
                                    $children = $subcategory->fetchAll(PDO::FETCH_OBJ);

                                    if($subcategory->rowCount()>0){
                                        foreach($children as $child){?>
                                            <li><a href="#"><?php echo ($child->CategoryName);?></a></li>
                                        <?php }
                                    } ?>
                                    </ul>
                                </li>
                           <?php }
                        }
                        ?> 
                       
                    </ul>
                </li>
                <li><a href="contact.php" class="selected_e">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</div>