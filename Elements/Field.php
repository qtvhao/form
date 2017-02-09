<?php
/**
 * Created by PhpStorm.
 * User: qtvha
 * Date: 2/9/2017
 * Time: 8:36 PM
 */

namespace Qtvhao\Form\Elements;


class Field extends Element
{
    public $required;
    public $label = '';
    public $id = '';

    public function required()
    {
        $this->required = true;
        return $this;
    }

    public function unique($table, $column)
    {
        $this->unique_in = $table;
        $this->unique_by = $column;
        return $this;
    }

    public function value($value)
    {
        $this->attribute('value', $value);
        return $this;
    }

    public function __construct()
    {
        parent::__construct();

    }

    public function label($text)
    {
        $this->label = $text;

        return $this;
    }
}