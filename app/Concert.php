<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $table = 'concert';

    protected $guarded = array('id');

    public static $rules = array(
        'date' => 'required',
        'tourname' => 'required',
        'artist' => 'required',
        'address' => 'required',
        'where' => 'required',
    );
}
