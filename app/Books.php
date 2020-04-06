<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{

    protected $fillable = [
        'isbn','name', 'author', 'edition','thumbnail','length'
    ];

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
