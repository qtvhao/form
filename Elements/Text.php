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

    public function __toString()
    {
        return '<input type="' . $this->type . '" name="" id="" class="form-control" value="" title="" required="required" >';
    }

}