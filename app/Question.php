<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['question'];
    // Table Name
    protected $table = 'questions';
    
    // Primary Key Field
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // A Question can have many Options
    public function options()
    {
        return $this->hasMany('App\Option');
    }
}
