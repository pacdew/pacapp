<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    // Table Name
    protected $table = 'results';
    
    // Primary Key Field
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
