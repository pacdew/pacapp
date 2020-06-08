<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    
    // Primary Key Field
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // Knows that the post created belongs to a specific user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
