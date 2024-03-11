<?php
include('config.php');

$themeVars = [
    '--light-bg' => $LIGHT_BACKGROUND,
    '--light-primary' => $LIGHT_TEXT,
    '--light-links' => $LIGHT_LINKS,
    '--dark-bg' => $DARK_BACKGROUND,
    '--dark-primary' => $DARK_TEXT,
    '--dark-links' => $DARK_LINKS,
    '--titles-font' => $TITLES,
    '--texts-font' => $TEXTS,
];
?>

<!DOCTYPE html>
<html lang="<?php echo $LANG; ?>">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="noai, noimageai">
    <meta property="og:locale" content="en_GB"/>
    <meta name="author" content="<?php echo $BLOG_AUTHOR; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $BLOG_LINK; ?>assets/img/icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $BLOG_LINK; ?>assets/img/icon.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $BLOG_LINK; ?>assets/img/icon.png"/>
    
    <?php if ($WEBMENTIONS === TRUE): ?>
        <script src="assets/scripts/webmention.min.js"></script>
        <link rel="webmention" href="<?php echo $WEBMENTIONSLINK; ?>"/>
        <link rel="pingback" href="<?php echo $PINGBACK; ?>"/>
    <?php endif; ?>

    <?php include('assets/tools/parsedown.php'); ?>
    <?php include('assets/tools/ParsedownExtra.php'); ?>
    <?php include('assets/tools/FrontMatter.php'); ?>
    
    <?php function getTitleAndSummary($filePath) {
        $frontmatter = new FrontMatter($filePath);
        $meta = [];
        $content = file_get_contents($filePath);
        $lines = explode("\n", $frontmatter->fetchContent());  // Change here
        
        foreach ($lines as $line) {
          // Check if the line starts with #
          if (strpos($line, '# ') === 0) {
              // Extract the title and remove # and any leading/trailing whitespaces
              $title = trim(substr($line, 2));
              break; // Stop searching after finding the first heading
          }
        }

        $summary = implode("\n", array_slice($lines, 1, 2)); // Extract the first two lines as summary
            return ['title' => $title, 'summary' => $summary];
        }

        $title = $BLOG_TITLE;
        $description = $BLOG_DESCRIPTION;
        $img = $BLOG_LINK.'assets/img/og.png';

        if (stripos($_SERVER['REQUEST_URI'], 'single.php')) {
            $id = $_GET['id'];
            $path = 'posts/' . $id . '.md';
            if (file_exists($path)) {
                $data = getTitleAndSummary($path);
                $frontmatter = new FrontMatter($path);
                foreach ($frontmatter->fetchMeta() as $key => $value) {
                    $meta[$key] = $value;
                }
                $title = $BLOG_TITLE . ' | ' . $data['title'];
                $description = $data['summary'];
                if (!empty($meta['img'])) {$img = $meta['img'];};
            }
        } elseif (stripos($_SERVER['REQUEST_URI'], 'page.php')) {
            $id = $_GET['id'];
            $path = 'pages/' . $id . '.md';
            if (file_exists($path)) {
                $data = getTitleAndSummary($path);
                $frontmatter = new FrontMatter($path);
                foreach ($frontmatter->fetchMeta() as $key => $value) {
                    $meta[$key] = $value;
                }
                $title = $BLOG_TITLE . ' | ' . $data['title'];
                $description = $data['summary'];
                if (!empty($meta['img'])) {$img = $meta['img'];};
            }
        }
    ;?>

    <!-- PAGE METAS -->
    <title><?php echo $title; ?></title>
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta property="og:description" content="<?php echo $description; ?>"/>
    <meta property="og:image" content="<?php echo $img; ?>"/>
    <!-- EOF PAGE METAS -->
    
    <link rel="stylesheet" href="<?php echo $BLOG_LINK; ?>assets/css/normalize.min.css">
    <style>
        :root {
            <?php foreach ($themeVars as $varName => $varValue): ?>
                <?php echo $varName; ?>: <?php echo $varValue; ?>;
            <?php endforeach; ?>
        }
    </style>
    <link rel="stylesheet" href="<?php echo $BLOG_LINK; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $BLOG_LINK; ?>assets/css/custom.css">
</head>
<body>
    <header>
        <h1><?php echo $BLOG_TITLE; ?></h1>
        <h2><?php echo $BLOG_TAGLINE; ?></h2>
    </header>
    <main class="home">
        <?php $index = false; ?>
        <?php include 'nav.php'; ?>
