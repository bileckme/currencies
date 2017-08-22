<?php namespace Domain\Api\Views\Composers;

/**
 * Class Composer
 * @package Domain\Api\Views\Composers
 */
abstract class Composer
{
    /**
     * @var array
     */
    public $attributes = [];

    /**
     * @var array
     */
    private $data;

    public function compose($view)
    {
        $view->with($this->attributes);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }
}