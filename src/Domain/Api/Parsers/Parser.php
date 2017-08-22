<?php namespace Domain\Api\Parsers;

use Illuminate\Support\Collection;
use GuzzleHttp\Client;
use SimpleXMLElement;
/**
 * Class Parser
 * @package Domain\Api\Parsers
 */
class Parser
{
    /**
     * @var
     */
    protected $parser;

    /**
     * @var
     */
    protected $client;

    /**
     * Parser constructor.
     * @param ParserInterface $parser
     * @param $client
     */
    public function __construct(ParserInterface $parser, $client)
    {
        $this->parser = $parser;
        $this->client = $client;
    }


    /**
     * @return SimpleXMLElement
     */
    public function getXml()
    {
        $options = LIBXML_COMPACT | LIBXML_PARSEHUGE | LIBXML_NOCDATA;

        return simplexml_load_string($this->loadXml(), 'SimpleXMLElement', $options);
    }

    /**
     * @return string
     */
    public function loadXml()
    {
        return $this->client->get($this->parser->getEndPoint())->getBody()->getContents();
    }

    /**
     * @return Collection
     */
    protected function getCollection()
    {
        $collection = $this->feed->mapXml($this->getXml());

        return $collection;
    }
}