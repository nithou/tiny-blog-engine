<?php include 'parts/header.php';?>

<section class="list h-feed"> <!-- article list -->

      <?php
        $index=true;
        $files = glob("posts/*.md");
        $counter = 0;
        rsort($files);
        foreach($files as $post) {
          $link_id = basename($post , ".md");

          // Use Frontmatter to parse the post contents
          $frontmatter = new FrontMatter($post);
          $meta = [];
          $title = [];

          // Get metakeys
          foreach ($frontmatter->fetchMeta() as $key => $value) {
             $meta[$key] = $value;
          }

          // Get content & summary
          $content= $frontmatter->fetchContent();
          $summary = substr($content, 1, 180); 
          $Parsedown = new ParsedownExtra();
          if ($counter == $POST_LIMIT) {
            break;
          }

          if ($SHOW_SUMMARY === TRUE) {
            echo '<article class="h-entry">';
            echo '<h1 class="p-name">'.$meta['title'].'</h1>';
            echo '<div class="p-summary">'.$Parsedown->text($summary).'</div>';
            echo '<a href="single.php?id='.$link_id.'" class="permalink u-url">'.$LINKTO.' &rarr;</a>';
            echo '</article>';
            $counter++;
          } else {
            echo '<article class="h-entry">';
            echo '<h1 class="p-name">'.$meta['title'].'</h1>';
            echo '<div class="e-content">'.$Parsedown->text($frontmatter->fetchContent()).'</div>';
            if (!empty($meta['img'])) {echo '<img src="'.$meta['img'].'" style="max-width:100%" />';};
            echo '<a href="single.php?id='.$link_id.'" class="permalink u-url">'.$LINKTO.' &rarr;</a>';
            echo '</article>';
            $counter++;
          };
        };
      ?>
</section>

<?php include 'parts/footer.php';?>
