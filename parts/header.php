<!DOCTYPE html>
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
<html lang="<?php echo $LANG; ?>">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="noai, noimageai">
    <meta property="og:locale" content="en_GB"/>
    <?php if (!empty($FEDIVERSE_CREATOR)): ?><meta name="fediverse:creator" content="<?php echo $FEDIVERSE_CREATOR; ?>"><?php endif; ?>
    <meta name="fediverse:creator" content="@Gargron@mastodon.social" />
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
    
    <?php
        $Parsedown = new ParsedownExtra();

        $title = $BLOG_TITLE;
        $titleHeader = $BLOG_TITLE;
        $summary = $BLOG_DESCRIPTION;
        $img = $BLOG_LINK . 'assets/img/og.png';

        // Function to handle meta, content, and summary extraction
        function processFrontMatter($type, $id, $Parsedown, $BLOG_TITLE, $BLOG_LINK) {
            $path = $type . '/' . $id . '.md';
            $frontmatter = new FrontMatter($path);

            // Fetch meta data
            $meta = $frontmatter->fetchMeta();
            $title = $meta['title'];
            $pubDate = $meta['published_date'];
            $titleHeader = $meta['title'] . " | " . $BLOG_TITLE;
            
            // Parse content using Parsedown
            $content = $Parsedown->text($frontmatter->fetchContent());

            // Get description from the metas or fall back to the first line
            if (!empty($meta['description'])) {
                $summary = $meta['description'];
            } else {
                // Fallback to the file's last modification time
                $summary = implode(".", array_slice(explode(".", $frontmatter->fetchContent()), 0, 1)) . "...";
            }

            // Set image if available, fallback to default
            $img = !empty($meta['img']) ? $meta['img'] : $BLOG_LINK . 'assets/img/og.png';

            return compact('title', 'titleHeader', 'pubDate', 'content', 'summary', 'img');
        }

        // Determine if it's a post or page
        if (stripos($_SERVER['REQUEST_URI'], 'single.php') !== false) {
            $id = $_GET['id'];
            extract(processFrontMatter('posts', $id, $Parsedown, $BLOG_TITLE, $BLOG_LINK));
        } elseif (stripos($_SERVER['REQUEST_URI'], 'page.php') !== false) {
            $id = $_GET['id'];
            extract(processFrontMatter('pages', $id, $Parsedown, $BLOG_TITLE, $BLOG_LINK));
        }
    ?>

    <!-- PAGE METAS -->
    <title><?php echo $titleHeader; ?></title>
    <meta property="og:title" content="<?php echo $titleHeader ?>"/>
    <meta name="description" content="<?php echo $summary; ?>"/>
    <meta property="og:description" content="<?php echo $summary; ?>"/>
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
