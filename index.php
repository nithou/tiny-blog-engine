<?php include 'header.php';?>
<section class="list"> <!-- article list -->
      
      <?php
        $files = glob("posts/*.md");
        rsort($files);
        foreach($files as $post) {
          $link_id = basename($post , ".md");
          $post = file_get_contents($post);
          $Parsedown = new Parsedown();
          echo '<article>';
          echo $Parsedown->text($post);
          echo '<a href="single.php?id='.$link_id.'">direct link</a>';
          echo '</article>';

        }
      ?>
</section>

<?php include 'footer.php';?>

