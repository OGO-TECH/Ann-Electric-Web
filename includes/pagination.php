<div class="pagelist">

    <?php if($_GET['page'] == 1){?>
        <a><<</a>
        <a><</a>
    <?php } else {?>
        <a href="product.php?id=<?php echo htmlentities($id) ?>&page=<?php echo ('1'); ?>"><<</a>
        <a href="product.php?id=<?php echo htmlentities($id) ?>&page=<?php echo $_GET['page'] - 1?>"><</a>
    <?php } ?>
        
    <?php for ($page = 1; $page <= $total_pages; $page ++) : ?>

        <?php if ($_GET['page'] == $page){ ?>
            <a class="selected" href="product.php?id=<?php echo htmlentities($id)?>&page=<?php echo $page; ?>"><?php echo $page; ?></a>
        <?php } else {?>
            <a href="product.php?id=<?php echo htmlentities($id)?>&page=<?php echo $page; ?>"><?php echo $page; ?></a>
        <?php } ?>

    <?php endfor; ?>

    <span>...</span>
    
    <?php if($_GET['page'] == $total_pages){?>
        <a>></a>
        <a>>></a>
    <?php } else {?>
    <a href="product.php?id=<?php echo htmlentities($id) ?>&page=<?php echo $_GET['page'] + 1; ?>">></a>
    <a href="product.php?id=<?php echo htmlentities($id) ?>&page=<?php echo $total_pages?>">>></a>
    <?php } ?>

</div>