<?php
namespace App\Debugs;

use Illuminate\Database\Eloquent\Model;
use App\Object;
use Collective\Html\FormFacade as Form;

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
        foreach (self::getObject()->fields as $field) {
            echo Form::input($field->name, $field->type);
        }
    }

    private static function edit()
    {

    }

    private static function view()
    {

    }

    private static function getObject()
    {
        return Object::where('class_name', class_basename(self::$model))->first();
    }
}
