<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    // Table Name
    protected $table = 'tests';

    //primary key field
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // data fields for mass assignment allowing
    protected $fillable = ['result'];

    // Test is owned by the user that took it
    public function user(){
        return $this->belongsTo('App\User');
    }
}
