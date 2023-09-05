<?php include 'header.php';?>
<section class="list"> <!-- article list -->

      <?php
        $index=true;
        $files = glob("posts/*.md");
        rsort($files);
        foreach($files as $post) {
          $link_id = basename($post , ".md");
          $post = file_get_contents($post);
          $title = implode("\n", array_slice(explode("\n", $post), 0, 1));
          $title = substr($title, 2);
          $summary = implode("\n", array_slice(explode("\n", $post), 1, 3));
          $Parsedown = new ParsedownExtra();

          if ($SHOW_SUMMARY === TRUE) {
            echo '<article>';
            echo '<h1>'.$title.'</h1>';
            echo $summary;
            echo '<a href="single.php?id='.$link_id.'" class="permalink">'.$LINKTO.'</a>';
            echo '</article>';
          } else {
            echo '<article>';
            echo $Parsedown->text($post);
            echo '<a href="single.php?id='.$link_id.'" class="permalink">'.$LINKTO.'</a>';
            echo '</article>';
          };
        };
      ?>
</section>

<?php include 'footer.php';?>
