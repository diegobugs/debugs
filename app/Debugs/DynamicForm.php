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
        // TODO: Agregar divs para que se vea bien el input (div.form-group en bootstrap)
        $form = '';
        if (static::$method == 'view' ){
            $form .= Form::model(static::$model);
            $form .= '<fieldset disabled>';
        } else {
            $form .= Form::model(static::$model ,['method ' => static::$methods[static::$method]]);
        }
        foreach (static::getObject()->fields as $field) {
            $fieldName = $field->name;
            $form .= '<div class="form-group">';
            $form .= Form::label($field->name, $field->label);
            $form .= Form::input($field->type, $field->name, Input::old($field->name, static::$model->$fieldName), ['class' =>'form-control']) . PHP_EOL;
            $form .= '</div>';
        }
        if (static::$method == 'view' ){
            $form .= '</fieldset>';
        } else {
            $form .= '<hr />';
            $form .= Form::submit('Save', ['name' => 'submit', 'class' => 'btn btn-primary']);
        }
        $form .= Form::close();

        return $form;
    }

    private static function edit()
    { }

    private static function view()
    { }

    private static function getObject()
    {
        return Obj::where('class_name', class_basename(static::$model))->first();
    }
}
