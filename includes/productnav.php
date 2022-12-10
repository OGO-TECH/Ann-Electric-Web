<div class="product_nav">
    <?php
    $sql = "SELECT * from category where parent_id = 0;";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if($query->rowCount()>0){
        foreach ($results as $result){?>
            <dl>
                <?php
                $catid = $result->id;
                $subcategory = $dbh->prepare('SELECT * from category where parent_id = ?');
                $subcategory->execute([$catid]);
                $children = $subcategory->fetchAll(PDO::FETCH_OBJ);     
                if($subcategory->rowCount()>0){ ?>
                    <dt><a href="javascript:;" class="flip"><?php echo htmlentities($result->CategoryName);?></a></dt>
                    <dd class="panel">
                    <?php foreach($children as $child){?>
                        <a href="subcategories.php?scid=<?php echo ($child->id);?>"> — <?php echo ($child->CategoryName);?></a>
                    <?php }?>
                    </dd>
                <?php } else { ?>
                    <dt><a href="categories.php?cid=<?php echo ($result->id);?>"><?php echo htmlentities($result->CategoryName);?></a></dt>
                <?php
                }
                ?>
            </dl>
        <?php }
    }
    ?>
</div>