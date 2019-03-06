<?php
namespace App\Debugs;

use Illuminate\Database\Eloquent\Model;
use App\Obj;
use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Input;

class DynamicForm
{
    private static $model;

    private static $method;

    private static $form = '';

    private static $methods = array('create' => 'POST', 'edit' => 'PATCH', 'show' => 'GET');

    public static function generateForm($model, String $method)
    {
        static::$model= $model;
        static::$method = $method;
        return static::$method();
    }

    private static function create()
    {
        // TODO: Decidir si se muestra en una sola columna, dos, tres, etc
        // TODO: Agregar Labels
        // TODO: Decidir como mostrar lo que se puede validar o no
        // TODO: Agregar los span para errores
        // TODO: Agregar divs para que se vea bien el input (div.form-group en bootstrap

        static::openForm();
        static::generateInputs();
        static::closeForm();

        return static::$form;
    }

    private static function edit()
    {
        static::openForm();
        static::generateInputs();
        static::closeForm();
    }

    private static function view()
    {
        static::$form .= Form::model(static::$model);
        static::$form .='<fieldset disabled>';

        static::generateInputs();
        static::closeForm();
    }

    private static function getObject()
    {
        return Obj::where('class_name', class_basename(static::$model))->first();
    }

    private static function openForm()
    {
        static::$form .= Form::model(static::$model, ['method ' => static::$methods[static::$method]]);
    }

    private static function generateInputs()
    {
        foreach (static::getObject()->fields()->whereNotIn('name', static::$model->getHidden())->get() as $field) {
            $fieldName = $field->name;
            static::$form .= '<div class="form-group">';
            static::$form .= Form::label($field->name, $field->label);
            static::$form .= Form::input($field->type, $field->name, Input::old($field->name, static::$model->$fieldName), ['class' =>' form-control']) . PHP_EOL;
            static::$form .= '</div>';
        }
        if (static::$method == 'view'){ 
            static::$form .= '</fieldset>';
        } else {
            static::$form .= '<hr />';
            static::$form .= Form::submit('Save', ['name' => 'submit', 'class' => 'btn btn-primary']);
        }
    }

    private static function closeForm()
    {
        static::$form .= Form::close();
    }
}
