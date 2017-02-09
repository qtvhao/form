<?php
/**
 * Created by PhpStorm.
 * User: qtvha
 * Date: 2/9/2017
 * Time: 9:26 PM
 */

namespace Qtvhao\Form\Elements;


class Text extends Field
{
    public $type = 'text';
    public $pattern;

    public function getTagName()
    {
        return 'input';
    }

    public function email()
    {
        $this->type = 'email';
        return $this;
    }

    public function url()
    {
        $this->type = 'text';
        $this->pattern = '';
        return $this;
    }

    public static function make($mean = '')
    {
        return parent::make();
    }

    public function __construct($mean = '')
    {
        parent::__construct();
        $this->means($mean);
        $this->label(str_replace(['_', '-'], '', title_case($mean)));
    }

    public function __toString()
    {
        return '<input type="' . $this->type . '" name="' . $this->mean . '" id="' . $this->id . '" class="form-control" value="' . $this->value . '" title="">';
    }

}