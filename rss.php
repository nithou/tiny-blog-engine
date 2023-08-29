<?php

// You should use an autoloader instead of including the files directly.
// This is adone here only to make the examples work out of the box.
include './assets/tools/feedwriter/Item.php';
include './assets/tools/feedwriter/Feed.php';
include './assets/tools/feedwriter/RSS2.php';
include './assets/tools/feedwriter/simple_html_dom.php';
include './assets/tools/parsedown.php';
include './config.php';

date_default_timezone_set('UTC');

use \FeedWriter\RSS2;

/*
 * Copyright (C) 2008 Anis uddin Ahmad <anisniit@gmail.com>
 *
 * This file is part of the "Universal Feed Writer" project.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

//Creating an instance of RSS2 class.
$TestFeed = new RSS2;

//Setting the channel elements
//Use wrapper functions for common channel elements
$TestFeed->setTitle($BLOG_TITLE);
$TestFeed->setLink($BLOG_LINK);
$TestFeed->setDescription($BLOG_DESCRIPTION);
$TestFeed->setChannelElement('language', 'en-US');
$TestFeed->setSelfLink($BLOG_LINK . 'rss.php');
$TestFeed->setAtomLink($BLOG_LINK . 'rss.php', 'hub');

$TestFeed->addGenerator();

//Image title and link must match with the 'title' and 'link' channel elements for valid RSS 2.0
$TestFeed->setImage($BLOG_TITLE ,$BLOG_LINK, $BLOG_LINK . 'assets/img/og.png');


//Let's add some feed items: Create two empty Item instances
   
        $files = glob("posts/*.md");
        rsort($files);
        foreach($files as $posts) {
            $link_id=pathinfo($posts, PATHINFO_FILENAME);
            $post = file_get_contents($posts);
            $Parsedown = new Parsedown();
            $newItem = $TestFeed->createNewItem();
            $itemDate = $link_id;
            $title = implode("\n", array_slice(explode("\n", $post), 0, 1));
            $title = substr($title, 2);
            $rmsimplequote = str_replace("'","", $itemDate);
            $itemDateClean = str_replace('"','', $rmsimplequote);
            $pubdate= strtotime ($itemDateClean);
            $content = stristr(file_get_contents($posts), "<p>");
            $contentFinal =  $Parsedown->text($post);
            $newItem->setTitle($title);
            $newItem->setLink($BLOG_LINK.'single.php?id='. $itemDateClean);
            $newItem->setID($BLOG_LINK.'single.php?id='. $itemDateClean);
            $newItem->setDate($pubdate);
            $newItem->setDescription($contentFinal);
            $newItem->setAuthor($BLOG_AUTHOR, $AUTHOR_EMAIL);
            $TestFeed->addItem($newItem);
        }

//OK. Everything is done. Now generate the feed.
$TestFeed->printFeed();
