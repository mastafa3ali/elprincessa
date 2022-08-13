<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='books';
    protected $guarded=[];
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function offer()
    {
        return $this->belongsTo('App\Models\Offer');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
