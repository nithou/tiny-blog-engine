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

<div class="about-me">
<hr>
<img src="./assets/img/author.jpg" alt="<?php echo $BLOG_AUTHOR;?>" height="75" width="75" class="author-image"> 
<h3 class="author-name p-author"><?php echo $BLOG_AUTHOR;?></h3>
<p><?php echo $AUTHOR_DESCRIPTION;?></p>
</div>
   
<!-- FULL BRID.GY FOR WEBMENTIONS SUPPORT -->
 <?php if ($WEBMENTIONS === TRUE) {
echo '<a href="https://brid.gy/publish/flickr" rel="webmention"></a>
<a href="https://brid.gy/publish/github" rel="webmention"></a>
<a href="https://brid.gy/publish/mastodon" rel="webmention"></a>
<a href="https://brid.gy/publish/twitter" rel="webmention"></a>
<data class="p-bridgy-omit-link" value="false"></data>
<div id="webmentions"></div>';} else {};?>
<!-- EOF BRID.GY -->

<!-- ADD COMMENTO SUPPORT -->
<?php if ($COMMENTO === TRUE) {
echo'<script defer src="https://cdn.commento.io/js/commento.js" data-css-override="./assets/css/commento.css" data-no-fonts=true></script>
<div id="commento"></div>';} else {};?>
   
</div>


</section>

<?php include 'parts/footer.php';?>
