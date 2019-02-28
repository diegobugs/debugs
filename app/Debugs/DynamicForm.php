<?php
namespace App\Debugs;

use Illuminate\Database\Eloquent\Model;
use App\Object;
use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Input;

class DynamicForm {
    private static $model;
    public static function generateForm($model, $method){
        self::$model = $model;
        switch($method){
            case 'create':
                {
                    self::create();
                }
                break;
            case 'edit':
                {
                    self::edit();
                }
                break;
            case 'view':
                {
                    self::view();
                }
                break;
        }
    }

    private static function create()
    {
        // TODO: Decidir si se muestra en una sola columna, dos, tres, etc
        // TODO: Agregar Labels
        // TODO: Decidir como mostrar lo que se puede validar o no
        // TODO: Agregar los span para errores
        // TODO: Agregar divs para que se vea bien el input (div.form-group en bootstrap)
        foreach (self::getObject()->fields as $field) {
            echo Form::input($field->type, $field->name, Input::old($field->name, $field->name), ['class' => 'form-control']) . PHP_EOL;
        }
    }

    private static function edit()
    { }

    private static function view()
    { }

    private static function getObject()
    {
        return Object::where('class_name', class_basename(self::$model))->first();
    }
}
