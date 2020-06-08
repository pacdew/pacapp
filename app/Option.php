<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    // Table Name
    protected $table = 'options';

    protected $fillable = ['option', 'correct', 'Q_id'];
    
    // Primary Key Field
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;
    
    // Each Option belongs to a single question
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    
}
