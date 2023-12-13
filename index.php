<?php include 'parts/header.php';?>
<section class="list h-feed"> <!-- article list -->

      <?php
        $index=true;
        $files = glob("posts/*.md");
        $counter = 0;
        rsort($files);
        foreach($files as $post) {
          $link_id = basename($post , ".md");
          $post = file_get_contents($post);
          $title = implode("\n", array_slice(explode("\n", $post), 0, 1));
          $title = substr($title, 2);
          $summary = implode("\n", array_slice(explode("\n", $post), 1, 3));
          $Parsedown = new ParsedownExtra();
          if ($counter == $POST_LIMIT) {
            break;
          }

          if ($SHOW_SUMMARY === TRUE) {
            echo '<article class="h-entry">';
            echo '<h1 class="p-name">'.$title.'</h1>';
            echo '<div class="p-summary">'.$Parsedown->text($summary).'</div>';
            echo '<a href="single.php?id='.$link_id.'" class="permalink u-url">'.$LINKTO.'</a>';
            echo '</article>';
            $counter++;
          } else {
            echo '<article class="h-entry">';
            echo '<div class="e-content">'.$Parsedown->text($post).'</div>';
            echo '<a href="single.php?id='.$link_id.'" class="permalink u-url">'.$LINKTO.'</a>';
            echo '</article>';
            $counter++;
          };
        };
      ?>
</section>

<?php include 'parts/footer.php';?>
