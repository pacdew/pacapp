<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    //
    protected $fillable = ['U_id', 'T_id', 'Q_id', 'O_id', 'correct'];

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
