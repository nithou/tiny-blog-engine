<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php include('assets/tools/parsedown.php');?>
    <?php include('config.php');?>
    
    <?php if (stripos($_SERVER['REQUEST_URI'], 'single.php'))
    {
    $id=$_GET['id'];
    $path = file_get_contents('posts/'.$id.'.md');
    $summary = implode("\n", array_slice(explode("\n", $path), 1, 2));
    $title = implode("\n", array_slice(explode("\n", $path), 0, 1));
    $title = substr($title, 2);
    echo '<title>' . $BLOG_TITLE . ' | ' . $title . '</title>
    <meta name="description" content="' . $summary . '" />
    <meta property="og:description" content="' . $summary . '" />
    <meta property="og:title" content="' . $BLOG_TITLE . ' | ' . $title . '" />';
    } 
    elseif (stripos($_SERVER['REQUEST_URI'], 'page.php')) {
    $id=$_GET['id'];
    $path = file_get_contents('pages/'.$id.'.md');
    $summary = implode("\n", array_slice(explode("\n", $path), 1, 2));
    $title = implode("\n", array_slice(explode("\n", $path), 0, 1));
    $title = substr($title, 2);
    echo '<title>' . $BLOG_TITLE . ' | ' . $title . '</title>
    <meta name="description" content="' . $summary . '" />
    <meta property="og:description" content="' . $summary . '" />
    <meta property="og:title" content="' . $BLOG_TITLE . ' | ' . $title . '" />';
    }
    {
    echo '<title>' . $BLOG_TITLE . '</title>
    <meta name="description" content="' . $BLOG_DESCRIPTION . '"/>
    <meta property="og:title" content="' . $BLOG_TITLE . '" />
    <meta property="og:description" content="' . $BLOG_DESCRIPTION . '" />';
    }
    ?>
    
    <meta property="og:locale" content="en_GB" />
    <meta property="og:image" content="<?php echo $BLOG_LINK; ?>assets/img/og.png" />
    <meta name="author" content="<?php echo $BLOG_AUTHOR; ?>">
    
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $BLOG_LINK; ?>assets/img/icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $BLOG_LINK; ?>assets/img/icon.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $BLOG_LINK; ?>assets/img/icon.png"/>

    <meta name="theme-color" content="#ffffff" />    
    
    <link rel="webmention" href="<?php echo $WEBMENTIONS; ?>" /> 
    <link rel="pingback" href="<?php echo $PINGBACK; ?>" />
        
    <style>
    :root {
        --light-bg: <?php echo $LIGHT_BACKGROUND; ?>;
        --light-primary: <?php echo $LIGHT_TEXT; ?>;
        --light-links: <?php echo $LIGHT_LINKS; ?>;
        --dark-bg: <?php echo $DARK_BACKGROUND; ?>;
        --dark-primary: <?php echo $DARK_TEXT; ?>;
        --dark-links: <?php echo $DARK_LINKS; ?>;
    }
    </style>
    <link rel="stylesheet" href="<?php echo $BLOG_LINK; ?>assets/css/style.css">

  </head>

  <body>
    <header>
        <h1><?php echo $BLOG_TITLE; ?></h1>
		    <h2><?php echo $BLOG_TAGLINE;?></h2>
    </header>

<main class="home">
<?php include 'nav.php';?>