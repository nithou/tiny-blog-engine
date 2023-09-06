<?php include 'parts/header.php';?>

<section class="single"> <!-- article list -->
<div>
<?php
   $html = file_get_contents('posts/'.$id.'.md');
   $Parsedown = new ParsedownExtra();
   echo '<article class="h-entry">';
   echo '<div class="e-content">'.$Parsedown->text($html).'</div>';
   echo '&#8249; <a href="'.$BLOG_LINK.'">'.$BACKTO.'</a>';
   echo '</article>';
?>

   
<!-- FULL BRID.GY FOR WEBMENTIONS SUPPORT -->
<a href="https://brid.gy/publish/flickr"></a>
<a href="https://brid.gy/publish/github"></a>
<a href="https://brid.gy/publish/mastodon"></a>
<a href="https://brid.gy/publish/twitter"></a>
<data class="p-bridgy-omit-link" value="false"></data>
<div id="webmentions"></div>
<!-- EOF BRID.GY -->
</div>


</section>

<?php include 'parts/footer.php';?>

