<?php namespace Domain\Api\Feeds;

use Domain\Api\Parsers\Collection;
use Domain\Api\Parsers\ParserInterface;
use Domain\Api\Parsers\SimpleXMLElement;

/**
 * Class AbstractFeed
 * @package Domain\Api\Feeds
 */
abstract class AbstractFeed implements ParserInterface
{

    /**
     * @var string
     * @example http://www.example.com/feeds/feed.xml
     */
    protected $endPoint;

    /**
     * @var
     */
    protected $feed;

    /**
     * @var string
     */
    //private $name;

    /**
     * @var string
     */
    //private $url;

    /**
     * Feed constructor.
     */
    public function __construct($endPoint)
    {
        $this->setEndPoint($endPoint);
    }

    /**
     * @param SimpleXMLElement $element
     *
     * @return Collection
     */
    public function mapXml(SimpleXMLElement $element)
    {
        $items    = [];
        $xmlArray = json_decode(json_encode($element), true);

        foreach ($xmlArray['feed'] as $xml) {
            $feed = new static($this->feed);
            $feed->setUrl($xmlArray['url']);
            $feed->setName($xmlArray['name']);
            $items[] = $feed;
        }
        /**
         * This is a sample feed
         * @example XML Feed
         * <feeds>
         *  <feed>
         *    <name>A sample feed</name>
         *    <url>http://www.example/feeds/feed-1.xml</url>
         *  </feed>
         *  <feed>
         *    <name>A sample feed</name>
         *    <url>http://www.example/feeds/feed-2.xml</url>
         *  </feed>
         *  <feed>
         *    <name>A sample feed</name>
         *    <url>http://www.example/feeds/feed-3.xml</url>
         *  </feed>
         * </feeds>
         */
    }

    /**
     * @param $endPoint
     */
    public function setEndPoint($endPoint)
    {
        $this->endPoint = $endPoint;
    }

    /**
     * @return string
     */
    public function getEndPoint()
    {
        return $this->endPoint;
    }
}