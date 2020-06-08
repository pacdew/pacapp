<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeightTracker extends Model
{
    // table name
    protected $table = 'weight_trackers';

    // Primary Key Field
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
