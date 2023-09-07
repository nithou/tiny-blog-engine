<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"]) && isset($_POST["count"])) {
    $id = $_POST["id"];
    $count = (int)$_POST["count"];
    
    // Ensure $id is safe to use as a file name to prevent directory traversal
    if (preg_match('/^[a-zA-Z0-9_-]+$/', $id)) {
        $fileName = "posts/kudos/".$id."-count.txt";

        // Write the new count to the file
        if (file_put_contents($fileName, $count)) {
            // Return the updated count as a response
            echo $count;
        } else {
            // Failed to update the count
            echo "Error: Unable to update the count.";
        }
    } else {
        // Invalid $id value
        echo "Error: Invalid ID.";
    }
} else {
    // Invalid request
    echo "Error: Invalid request.";
}
?>