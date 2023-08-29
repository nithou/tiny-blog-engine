<?php include 'header.php';?>

<section class="single"> <!-- article list -->
<div class="h-entry">
<?php
   $html = file_get_contents('posts/'.$id.'.md');
   $Parsedown = new Parsedown();
   echo '<article>';
   echo $Parsedown->text($html);
   echo '&#8249; <a href="'.$BLOG_LINK.'">back to the list</a>';
   echo '</article>';
?>

<div id="webmentions"></div>
</div>

<a href="https://brid.gy/publish/mastodon"></a>
</section>

<?php include 'footer.php';?>

