<?php
use PHPUnit\Framework\TestCase;

class RssTest extends TestCase
{
    public function testFeedContainsPosts()
    {
        ob_start();
        include 'rss.php';
        $xml = ob_get_clean();

        $feed = new SimpleXMLElement($xml);
        $items = $feed->channel->item;

        $expected = [
            [
                'title' => 'One World',
                'link'  => 'https://nithou.net/sandbox/single.php?id=2023-09-01',
            ],
            [
                'title' => 'We chose to go to the moon',
                'link'  => 'https://nithou.net/sandbox/single.php?id=2023-08-01',
            ],
        ];

        $this->assertCount(count($expected), $items);
        foreach ($expected as $index => $exp) {
            $this->assertEquals($exp['title'], (string)$items[$index]->title);
            $this->assertEquals($exp['link'], (string)$items[$index]->link);
        }
    }
}
