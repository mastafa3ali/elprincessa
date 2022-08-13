<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','price','description','short_description','photo','user_id','min_price','active','befor_discount'];
    public $appends=['image'];


    public function getImageAttribute()
    {
        $images=[];
       $data= json_decode($this->attributes['photo']);
        if($data!= null){
            foreach($data as $photo){
             $images[]=asset('storage/offers/'.$photo );
            }
        }
        if(count($images)==0){
            $images[]=asset('img/default.png');
        }
        return $images;

    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
