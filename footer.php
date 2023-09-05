    </section>
</main>

<?php if (stripos($_SERVER['REQUEST_URI'], 'index.php'))
    {
    echo '<div id="more"><a class="more" href="./archive.php">'.$MOREPOSTS.'</a></div>';
    } 
    else {
      echo '';
};?>

<footer>
    <!-- Have a nice day -->
</footer>

  </body>
</html>
