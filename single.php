<?php include 'parts/header.php';?>

<section class="single"> <!-- article list -->
<div>
<?php
   $html = file_get_contents('posts/'.$id.'.md');
   $Parsedown = new ParsedownExtra();
   echo '<article class="h-entry">';
   echo $Parsedown->text($html);
   echo '&#8249; <a href="'.$BLOG_LINK.'">'.$BACKTO.'</a>';
   echo '</article>';
?>

<div id="webmentions"></div>
</div>

<a href="https://brid.gy/publish/mastodon"></a>
<a href="https://brid.gy/publish/twitter"></a>
<data class="p-bridgy-omit-link" value="false"></data>

</section>

<?php include 'parts/footer.php';?>

