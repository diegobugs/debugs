<?php
namespace App\Debugs;

trait HasFormTrait {
    /*
    * Relationships
    */
    // public function object()
    // {
    //     return $this->hasOne('App\Object');
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
        $this->generateForm('create');
    }
    public function editForm()
    {
        $this->generateForm('edit');
    }
    public function viewForm()
    {
        $this->generateForm('view');
    }

    private function generateForm($method){
        DynamicForm::generateForm($this, $method);
    }
}