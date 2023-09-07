<?php include 'parts/header.php'; ?>

<section class="single page">
    <div class="h-entry">
        <?php
        $html = file_get_contents('pages/' . $id . '.md');
        $Parsedown = new ParsedownExtra();
        ?>
        <article>
            <?php echo $Parsedown->text($html); ?>
            &#8249; <a href="<?php echo $BLOG_LINK; ?>"><?php echo $BACKTO; ?></a>
        </article>
    </div>
</section>

<?php include 'parts/footer.php'; ?>