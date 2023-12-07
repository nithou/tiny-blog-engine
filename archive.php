<?php include 'parts/header.php'; ?>

<section class="list h-feed">
    <?php
    $files = glob("posts/*.md");
    rsort($files);

    foreach ($files as $post) {
        $link_id = basename($post, ".md");
        $postContent = file_get_contents($post);
        $title = substr($postContent, 2, strpos($postContent, "\n") - 2);
        $summary = implode("\n", array_slice(explode("\n", $postContent), 1, 3));
        $Parsedown = new ParsedownExtra();

        echo '<article class="h-entry">';

        if ($SHOW_SUMMARY === TRUE) {
            echo '<h1>' . $title . '</h1>';
            echo '<div class="p-summary">' . $Parsedown->text($summary) . '</div>';
        } else {
            echo '<div class="e-content">' . $Parsedown->text($postContent) . '</div>';
        }

        echo '<a href="single.php?id=' . $link_id . '" class="permalink u-url">' . $LINKTO . '</a>';
        echo '</article>';
    }
    ?>
</section>

<?php include 'parts/footer.php'; ?>