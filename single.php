<?php include 'parts/header.php';?>

<section class="single">
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
 <?php if ($WEBMENTIONS === TRUE) {
		echo '<a href="https://brid.gy/publish/flickr" rel="webmention"></a>
<a href="https://brid.gy/publish/github" rel="webmention"></a>
<a href="https://brid.gy/publish/mastodon" rel="webmention"></a>
<a href="https://brid.gy/publish/twitter" rel="webmention"></a>
<data class="p-bridgy-omit-link" value="false"></data>
<div id="webmentions"></div>';} else {};?>
<!-- EOF BRID.GY -->
   
</div>


</section>

<?php include 'parts/footer.php';?>

