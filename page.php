<?php include 'parts/header.php';?>

<section class="single page">
<div class="h-entry">
<?php
   $html = file_get_contents('pages/'.$id.'.md');
   $Parsedown = new ParsedownExtra();
   echo '<article>';
   echo $Parsedown->text($html);
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
   
</section>

<?php include 'parts/footer.php';?>

