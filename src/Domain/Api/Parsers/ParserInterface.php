<?php namespace Domain\Api\Parsers;

/**
 * Interface ParserInterface
 * @package Domain\Api\Parsers
 */
interface ParserInterface
{
    /**
     * @param SimpleXMLElement $element
     *
     * @return Collection
     */
    public function mapXml(SimpleXMLElement $element);

    /**
     * @return string
     */
    public function getEndPoint();

    /**
     * @param $endPoint
     */
    public function setEndPoint($endPoint);

}