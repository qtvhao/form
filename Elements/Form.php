<?php
/**
 * Created by PhpStorm.
 * User: qtvha
 * Date: 2/9/2017
 * Time: 8:25 PM
 */

namespace Qtvhao\Form\Elements;


class Form extends Element
{
    /**
     * @var \Illuminate\Support\Collection|Field[]
     */
    public $fields;
    public $action = '';

    public function __construct()
    {
        parent::__construct();
        $this->fields = collect();
    }

    public function getTagName()
    {
        return 'form';
    }

    public function action($action)
    {
        $this->action = $action;

        return $this;
    }

    public function __toString()
    {
        return '<form class="form-horizontal" action="' . $this->action . '">' .
            $this->fields->map(function (Field $field, $key) {
                $field->id = 'fm-' . $key;

                $label = '';
                if ($field->label) {
                    $label = '<label for="' . $field->id . '" class="col-sm-2 control-label">' . $field->label . ':</label>';
                }
                return '
<div class="form-group">
	' . $label . '
	<div class="col-sm-10">
	' . $field . '
	</div>
</div>
        ';
            })->implode('') . '
        </form>
        ';
    }

    public function getJqueryValidationOptions()
    {
        $jQueryValidationOptions = [];
        foreach ($this->fields as $field) {
            foreach ($field->rules as $rule) {
                $methodApplierJquery = "jQueryValidatorApply" . studly_case($rule['name']);
                $params = [$jQueryValidationOptions, $rule['options']['params']];
                $jQueryValidationOptions = call_user_func_array([$field, $methodApplierJquery], $params);
            }
        }

        return $jQueryValidationOptions;
    }

}