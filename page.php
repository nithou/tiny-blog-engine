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
</section>

<?php include 'parts/footer.php';?>

