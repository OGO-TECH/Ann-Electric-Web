
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
                        $sql = "SELECT * from tblcategory";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
    
                        if($query->rowCount()>0){
                            foreach ($results as $result){?>
                                <li><a href="#"><?php echo htmlentities($result->CategoryName);?></a></li>
                           <?php }
                        }
                        
                        ?>  <!--
                        <li> <a href="product/84.html">Switches&Sockets</a>
                            <ul>
                                <li><a href="product/107.html">Luxury Range</a></li>
                                <li><a href="product/107.html">MG Range</a></li>
                                <li><a href="product/105.html">Ivory Range</a></li>
                                <li><a href="product/98.html">Alpha Range</a></li>
                                <li><a href="product/100.html">Lavina Range</a></li>
                                <li><a href="product/104.html">Legend E Range</a></li>
                                <li><a href="product/103.html">Elegance Range</a></li>
                                <li><a href="product/106.html">Legend-1 Range</a></li>
                                <li><a href="product/101.html">Busch Range</a></li>
                                <li><a href="product/102.html">Classy Range</a></li>
                                <li><a href="product/99.html">Aura Range</a></li>
                                <li><a href="product/109.html">Unique Range</a></li>
                                <li><a href="product/117.html">Sonia Range</a></li>
                                <li><a href="product/119.html">Ultraflat range</a></li>
                                <li><a href="product/116.html">Duro Range</a></li>
                                <li><a href="product/115.html">Metal Clad</a></li>
                            </ul>
                        </li>

                        <li> <a href="product/85.html">Lampholder</a>
                            <ul>
                                <li><a href="product/110.html">Drop</a></li>
                                <li><a href="product/111.html">Straight</a></li>
                                <li><a href="product/112.html">Angled</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </li>
                <li><a href="contact.php" class="selected_e">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</div>