<div id="kudos">
  <?php  
    function getCounter($counterID) {
      $fileName = "posts/kudos/".$counterID."-count.txt"; 
      if (file_exists($fileName)) {
        list($numVisitors) = file($fileName); // Read contents from the file
      } else {
        $numVisitors = 0; // This is the first time the page is accessed
      }
      return $numVisitors;    // Return the current count
    }

    $counter = getCounter($id);

    echo '<span class="counter">' . $counter . '</span>';  
  ?>
  <button type="button" id="kudosButton">
    <svg class="heart" width="24" height="24" viewBox="0 0 24 24">
      <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z">        
      </path>
    </svg>
  </button>
</div>

<script>
  // JavaScript to increment likes and update the counter on the client side
  document.getElementById("kudosButton").addEventListener("click", function() {
    // Check if the button is already activated
    if (!this.classList.contains("activated")) {
      // Add a CSS class to the button
      this.classList.add("activated");

      // Update the counter text on the button
      var counterElement = document.querySelector("#kudos .counter");
      var newCounterValue = parseInt(counterElement.textContent) + 1;
      counterElement.textContent = newCounterValue;

      // Send an AJAX request to update the server-side count
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "increment_likes.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send("id=<?php echo $id; ?>&count=" + newCounterValue);
    }
  });
</script>