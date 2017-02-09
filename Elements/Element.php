<?php
/**
 * Created by PhpStorm.
 * User: qtvha
 * Date: 2/9/2017
 * Time: 8:15 PM
 */

namespace Qtvhao\Form\Elements;


class Element
{
    public $attributes;
    public $classes;

    public function getTagName()
    {
        return 'div';
    }

    public function addClass($className)
    {
        data_set($this, 'classes.' . $className, $className);
        return $this;
    }

    public function __construct()
    {
        $this->attributes = new \stdClass();
    }

    public static function make()
    {
        return new static();
    }

    public function __toString()
    {
        return ' ';
    }

    function attribute($name, $value)
    {
        data_set($this, 'attributes.' . $name, $value);

        return $this;
    }
}