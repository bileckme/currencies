<?php namespace Domain\Api\Views\Composers;

/**
 * Class ViewComposer
 * @package Domain\Api\Views\Composers
 */
class ViewComposer extends Composer
{
    /**
     * @var array
     */
    public $breadcrumb = [];

    /**
     * Composer constructor.
     * @param mixed $attributes Data Attributes or Array
     */
    public function __construct($attributes = array())
    {
        if (!empty($attributes))
            $this->setData($attributes);
    }

    /**
     * @return array
     */
    public function getBreadcrumb()
    {
        return $this->breadcrumb;
    }

    /**
     * @param array $breadcrumb
     */
    public function setBreadcrumb(array $breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;
    }



}