<div class="header">
    <div class="logo">
        <a href="javascript:history.back(-1);"><img src="assets/images/btn_return.png" /></a>
    </div>
    <div class="title">Ann Electric</div>
    <div class="btn_menu" onClick="switchSysBar()" id="switchPoint"></div>
</div>

<div class="menu_box" id="frmTitle" name="fmTitle">
    <dl><dt><a href="index.php" class="flip">Home</a></dt></dl>
    <dl><dt><a href="about.php" class="flip">About us</a></dt></dl>
    <dl><dt><a href="javascript:void(0);" class="flip">Product</a></dt>

        <dd class="panel">
            
            <?php
            $sql = "SELECT * from category where parent_id IS NULL;";
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
                            <li class="flip2"><a href="javascript:void(0);"><?php echo htmlentities($result->CategoryName); ?></a>
                                <ul class="panel2">
                                    <?php foreach ($children as $child) {?>
                                        <a href="product.php?id=<?php echo htmlentities($child->id) ?>&page=<?php echo ('1'); ?>"> — <?php echo ($child->CategoryName); ?></a>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else {?>
                            <li><a href="product.php?id=<?php echo ($result->id); ?>&page=<?php echo ('1'); ?>"><?php echo htmlentities($result->CategoryName); ?></a></li>
                        <?php }?>
                    </ul>
            <?php }
            } ?>

        </dd>
    </dl>

    <dl><dt><a href="contact.php" class="flip">Contact us</a></dt></dl>

</div>