<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table="tasks";
    protected $fillable=[
        'title',
        'description',
        'priority',
        'cartegor_id',
    ];

    public function cartegor()
    {
        return $this->belongsTo(Cartegor::class);
    }

    public function priorit()
    {
        return $this->belongsTo('App\Priorit');
    }
}
