<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartegor extends Model
{
    protected $table="cartegors";
    protected $fillable=[
        'name',
    ];

    public function task()
    {
        return $this->hasMany('App\Task');
    }
}
