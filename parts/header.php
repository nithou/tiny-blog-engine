<?php
include('config.php');

function getTitleAndSummary($filePath) {
    $content = file_get_contents($filePath);
    $lines = explode("\n", $content);
    $title = substr($lines[0], 2); // Extract the title (assuming it starts with "## ")
    $summary = implode("\n", array_slice($lines, 1, 2)); // Extract the first two lines as summary
    return ['title' => $title, 'summary' => $summary];
}

$title = $BLOG_TITLE;
$description = $BLOG_DESCRIPTION;

if (stripos($_SERVER['REQUEST_URI'], 'single.php')) {
    $id = $_GET['id'];
    $path = 'posts/' . $id . '.md';
    if (file_exists($path)) {
        $data = getTitleAndSummary($path);
        $title = $BLOG_TITLE . ' | ' . $data['title'];
        $description = $data['summary'];
    }
} elseif (stripos($_SERVER['REQUEST_URI'], 'page.php')) {
    $id = $_GET['id'];
    $path = 'pages/' . $id . '.md';
    if (file_exists($path)) {
        $data = getTitleAndSummary($path);
        $title = $BLOG_TITLE . ' | ' . $data['title'];
        $description = $data['summary'];
    }
}

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
    <meta property="og:locale" content="en_GB"/>
    <meta property="og:image" content="<?php echo $BLOG_LINK; ?>assets/img/og.png"/>
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
    
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta property="og:title" content="<?php echo $title; ?>"/>
    <meta property="og:description" content="<?php echo $description; ?>"/>
    
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
