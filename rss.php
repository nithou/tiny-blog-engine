<?php
require './assets/tools/feedwriter/Item.php';
require './assets/tools/feedwriter/Feed.php';
require './assets/tools/feedwriter/RSS2.php';
require './assets/tools/feedwriter/simple_html_dom.php';
require './assets/tools/parsedown.php';
require './assets/tools/FrontMatter.php';
require './config.php';

date_default_timezone_set('UTC');

use \FeedWriter\RSS2;

$TestFeed = new RSS2;

$TestFeed->setTitle($BLOG_TITLE)
    ->setLink($BLOG_LINK)
    ->setDescription($BLOG_DESCRIPTION)
    ->setChannelElement('language', $LANG)
    ->setSelfLink($BLOG_LINK . 'rss.php')
    ->setAtomLink($BLOG_LINK . 'rss.php', 'hub')
    ->addGenerator()
    ->setImage($BLOG_TITLE, $BLOG_LINK, $BLOG_LINK . 'assets/img/og.png');

$files = glob("posts/*.md");
rsort($files);

foreach ($files as $postFile) {
    $link_id = pathinfo($postFile, PATHINFO_FILENAME);
    $frontmatter = new FrontMatter($postFile);
    $postContent = $frontmatter->fetchContent($postFile);
    $Parsedown = new Parsedown();
    $newItem = $TestFeed->createNewItem();
    $itemDate = substr($link_id, 0, strpos($link_id, "_"));
    $itemDate = $link_id;
    $title = $frontmatter->fetchMeta($title);
    $itemDateClean = str_replace('"', '', str_replace("'", "", $itemDate));
    $pubdate = strtotime($itemDateClean);
    $content = stristr($postContent, "<p>");
    $contentFinal =  $Parsedown->text($postContent);

    $newItem->setTitle($title)
        ->setLink($BLOG_LINK . 'single.php?id=' . $itemDateClean)
        ->setID($BLOG_LINK . 'single.php?id=' . $itemDateClean)
        ->setDate($pubdate)
        ->setDescription($contentFinal)
        ->setAuthor($BLOG_AUTHOR, $AUTHOR_EMAIL);

    $TestFeed->addItem($newItem);
}

$TestFeed->printFeed();