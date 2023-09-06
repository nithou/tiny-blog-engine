<?php  
  if(isset($_POST['kudos'])) {
      function getCounter($counterID) {
         $fileName = "posts/kudos/".$counterID."-count.txt"; 
         if( file_exists($fileName) ) {
            list($numVisitors)=file($fileName); // Read contents from the file
         } else {
            $numVisitors=0; // This is the first time the page is accessed
         }
         $numVisitors=$numVisitors+1;
         $fil=fopen($fileName,"w");    // Open the file to replace old value
         fputs($fil,$numVisitors);     // Write the new count to the file
         fclose($fil);           // Close the file
         return $numVisitors;    // Return the new countÒ
      }
      echo '<div id="kudos">';
      echo  '<span class="counter">'.getCounter("$id").'</span>';
      echo '<form method="post"><button type="submit" name="kudos" value="kudos"/><svg class="heart" width="24" height="24" viewBox="0 0 24 24"><path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path></svg></button></form>';
      echo '</div>';
  } else {
      function getCounter($counterID) {
         $fileName = "posts/kudos/".$counterID."-count.txt"; 
         if( file_exists($fileName) ) {
            list($numVisitors)=file($fileName); // Read contents from the file
         } else {
            $numVisitors=0; // This is the first time the page is accessed
         }
         $fil=fopen($fileName,"w");    // Open the file to replace old value
         fputs($fil,$numVisitors);     // Write the new count to the file
         fclose($fil);           // Close the file
         return $numVisitors;    // Return the new countÒ
      }
      echo '<div id="kudos">';
      echo  '<span class="counter">'.getCounter("$id").'</span>';
      echo '<form method="post"><button type="submit" name="kudos" value="kudos"/><svg class="heart" width="24" height="24" viewBox="0 0 24 24"><path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path></svg></button></form>';
      echo '</div>';
  };
?>
