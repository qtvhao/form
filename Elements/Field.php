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
    public $label = '';
    public $id = '';
    public $value = '';
    public $mean = '';
    public $rules = [];

    /**
     * @return Field $this
     */
    public function required()
    {
        $this->rule('required');
        return $this;
    }

    public function rule($name, $options = ['params' => []])
    {
        data_set($this, 'rules.' . $name, compact('name', 'options'));

        return $this;
    }

    public function unique($table, $column)
    {
        return $this->rule('unique', [
            'params' => [compact('table', 'column')]
        ]);
    }

    public function value($value)
    {
        $this->value = $value;
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

    public function means($mean)
    {
        $this->mean = $mean;
        return $this;
    }

    public function jQueryValidatorApplyRequired($results, $parameters)
    {
        data_set($results, "rules.{$this->mean}.required", true);

        return $results;
    }

    public function jQueryValidatorApplyUnique($results, $parameters)
    {
        data_set($results, "rules.{$this->mean}.remote", data_get($this, 'remoteUrl', 'jquery-validation-remoter.php?selector=' . implode('.', $parameters)));

        return $results;
    }

    public function jQueryValidatorApplyIn($results, $parameters)
    {
        throw new \Exception();
    }

    public function jQueryValidatorApplyEmail($results, $parameters)
    {
        data_set($results, "rules.{$this->mean}.email", true);

        return $results;
    }

    public function jQueryValidatorApplyUrl($results, $parameters)
    {
        data_set($results, "rules.{$this->mean}.url", true);

        return $results;
    }

    public function jQueryValidatorApplySame($results, $parameters)
    {
        data_set($results, "rules.{$this->mean}.equalTo", "[name={$parameters[0]}]");

        return $results;
    }
}