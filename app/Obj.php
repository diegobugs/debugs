<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obj extends Model
{
    protected $table = 'objects';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    
    public function fields()
    {
        return $this->hasMany('App\Field', 'object_id');
    }
    
}
