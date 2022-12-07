<?php
                                $sql = "SELECT * from tblsubcategory";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                echo($query->rowCount());
                                if($query->rowCount()>0){
                                    foreach ($rows as $row){ ?>
                                        <li><a href="product/products.php?scid=<?php $row->id?>"><?php echo htmlentities($result->subCategoryName); ?></a></li>
                                    <?php }
                                }