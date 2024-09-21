<?php include 'parts/header.php'; ?>

<section class="single">
    <article class="h-entry">
        <h1><?php echo $title ?></h1>
        <div class="e-content">
             <?php echo $content; ?>

            <?php
            $defaultImg = $BLOG_LINK . 'assets/img/og.png';  // Define the default image URL

            // Only display the image if it's not the default one
            if (!empty($img) && $img !== $defaultImg) {
                echo '<img src="' . htmlspecialchars($img) . '" style="max-width:100%" alt="Image" />';
            }
            ?>

        </div>
        <a href="<?php echo $BLOG_LINK; ?>" class="permalink">&larr; <?php echo $BACKTO; ?></a>
    </article>

    <!-- KUDOS SYSTEM -->
    <?php if ($KUDOS === TRUE) {
        include './kudos.php';
    } ?>

    <!-- AUTHOR -->
    <hr>
    <div class="about-me">
        <img src="./assets/img/author.jpg" alt="<?php echo $BLOG_AUTHOR; ?>" height="75" width="75" class="author-image">
        <div class="author-infos">
            <h3 class="author-name p-author"><?php echo $BLOG_AUTHOR; ?></h3>
            <p><?php echo $AUTHOR_DESCRIPTION; ?></p>
        </div>
    </div>

    <!-- FULL BRID.GY FOR WEBMENTIONS SUPPORT -->
    <?php if ($WEBMENTIONS === TRUE) : ?>
        <a href="https://brid.gy/publish/flickr" rel="webmention"></a>
        <a href="https://brid.gy/publish/github" rel="webmention"></a>
        <a href="https://brid.gy/publish/mastodon" rel="webmention"></a>
        <a href="https://brid.gy/publish/twitter" rel="webmention"></a>
        <data class="p-bridgy-omit-link" value="false"></data>
        <div id="webmentions"></div>
    <?php endif; ?>
    <!-- EOF BRID.GY -->

    <!-- ADD COMMENTO SUPPORT -->
    <?php if ($COMMENTO === TRUE) : ?>
        <script defer src="<?php echo $COMMENTO_URL; ?>" data-css-override="./assets/css/commento.css"></script>
        <div id="commento"></div>
    <?php endif; ?>
</section>

<?php include 'parts/footer.php'; ?>