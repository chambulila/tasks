<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priorit extends Model
{
    protected $table="priorits";
    protected $fillable=[
        'title',
    ];

    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
