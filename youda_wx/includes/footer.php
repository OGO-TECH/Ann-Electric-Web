<div class="footer">

    <dl><dt class="footer_btn"><a href="index.php"><img src="assets/images/footer_01.png" /></a></dt></dl>
    <dl><dt class="footer_btn"><a href="about.php"><img src="assets/images/footer_02.png" /></a></dt></dl>
    <dl><dt class="footer_btn"><a href="contact.php"><img src="assets/images/footer_03.png" /></a></dt></dl>
    <dl><dt class="footer_btn"><a href="javascript:void(0);"><img src="assets/images/footer_04.png" /></a></dt>

        <dd class="footer_hide">

            <?php
            $sql = "SELECT * from category where parent_id = 0;";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) { ?>
                    <ul>
                        <?php
                        $catid = $result->id;
                        $subcategory = $dbh->prepare('SELECT * from category where parent_id = ?');
                        $subcategory->execute([$catid]);
                        $children = $subcategory->fetchAll(PDO::FETCH_OBJ);
                        if ($subcategory->rowCount() > 0) { ?>
                            <li class="class=footer_btn2"><a href="javascript:void(0);"><?php echo htmlentities($result->CategoryName); ?></a>
                                <ul class="footer_hide2">
                                    <?php foreach ($children as $child) {?>
                                        <li><a href="product.php?id=<?php echo htmlentities($child->id) ?>&page=<?php echo ('1'); ?>"> — <?php echo ($child->CategoryName); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else {?>
                            <li class="footer_btn2"><a href="product.php?id=<?php echo ($result->id); ?>&page=<?php echo ('1'); ?>"><?php echo htmlentities($result->CategoryName); ?></a></li>
                        <?php }?>
                    </ul>
            <?php }
            } ?>
 
        </dd>
    </dl>
</div>