<?php
namespace App\Http\Repositories\Eloquent;
use App\Http\Repositories\Interfaces\OfferRepoInterface;
use App\Http\Repositories\Eloquent\AbstractRepo;
use App\Models\Book;
use App\Models\Offer;

class OfferRepo extends AbstractRepo implements OfferRepoInterface
{
    public function __construct()
    {
        parent::__construct(Offer::class);
    }

    public function search($name){
        return Offer::where('name','like','%'.$name.'%')->get();
    }

    public function getCurrent(){
        return Book::where('user_id',auth()->user()->id)->where('date','>=',date('Y-m-d'))->get();
    }

    public function getPrevious(){
        return Book::where('user_id',auth()->user()->id)->where('date','<',date('Y-m-d'))->get();
    }

}
