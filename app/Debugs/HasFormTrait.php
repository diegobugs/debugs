<?php
namespace App\Debugs;

trait HasFormTrait {
    /*
    * Relationships
    */
    // public function object()
    // {
    //     return $this->hasOne('App\Obj');
    // }

    // public function fields()
    // {
    //     return $this->hasMany('App\Field');
    // }

    /*
    * Forms
    */
    public function createForm()
    {
        return $this->generateForm('create');
    }
    public function editForm()
    {
        return $this->generateForm('edit');
    }
    public function viewForm()
    {
        return $this->generateForm('view');
    }

    private function generateForm($method){
        return DynamicForm::generateForm($this, $method);
    }
}