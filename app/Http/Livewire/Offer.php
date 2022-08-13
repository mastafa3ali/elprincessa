<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Offer as ModelsOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Offer extends Component
{
    public $book_succss=False;
    public $paid;
    public $date;
    public $order_no;
    public $transfered;
    public $vodafone;
    public $row_id;
    public function mount($row_id){
        $this->row_id=$row_id;
        $this->paid='price';
        $this->date=date('Y-m-d');
    }
    public function render()
    {
        return view('livewire.offer');
    }
    public function book()
    {
        if(Auth::check()){

            try {
                $offer=ModelsOffer::find($this->row_id);
                if($offer){
                    $price=0;
                    if($this->paid=='min_price'){
                        $price=$offer->min_price;
                        $data=[
                            'status'=>'pending',
                            'paid_price'=>$offer->min_price,
                            'offer_id'=>$this->row_id,
                            'date'=>$this->date,

                            'paid'=>false,
                            'user_id'=>auth()->user()->id,

                        ];
                    }else{
                        $price=$offer->price;
                        $data=[
                            'status'=>'pending',
                            'offer_id'=>$this->row_id,
                            'paid_price'=>$offer->price,
                            'date'=>$this->date,
                            'paid'=>false,
                            'user_id'=>auth()->user()->id,

                        ];
                    }
                    $book=Book::create($data);
                    $this->order_no=$book->id;
                    $this->transfered=$price;
                    $this->vodafone=websiteInfo('phoneCach');

                    $this->book_succss=True;
                    return ;

                }

            } catch (\Exception $e) {
                DB::rollback();
            }
        }else{
            return redirect()->route('login');
        }
    }
    public function closeToast(){
        $this->book_succss=false;
    }

}
