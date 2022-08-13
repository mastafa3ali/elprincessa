<?php
namespace App\Http\Controllers\Api\LookUp;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\OfferRepo;
use App\Http\Requests\Api\OfferRequest;
use App\Http\Requests\PaginateRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\OfferResource;
use App\Http\Resources\SearchResource;
use App\Models\Book;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class OfferController extends Controller
{
    protected $repo;

    public function __construct(OfferRepo $repo)
    {
        $this->repo = $repo;

    }

    public function index(PaginateRequest $request)
    {
        $input = $this->repo->inputs($request->all());
        $model = new Offer();
        $columns = Schema::getColumnListing($model->getTable());

        if (count($input["columns"]) < 1 || (count($input["columns"]) != count($input["column_values"])) || (count($input["columns"]) != count($input["operand"]))) {
            $wheres = [];
        } else {
            $wheres = $this->repo->whereOptions($input, $columns);

        }
        $data = $this->repo->Paginate($input, $wheres);

        return responseSuccess([
            'data' => $input["resource"] == "all" ? OfferResource::collection($data) : SearchResource::collection($data),
            'meta' => [
                'total' => $data->count(),
                'currentPage' => $input["offset"],
                'lastPage' => $input["paginate"] != "false" ? $data->lastPage() : 1,
            ],
        ],  __('app.data_returned_successfully'));
    }

    public function show($id){
        $row=$this->repo->findOrFail($id);
        return responseSuccess([
            'data' => new OfferResource($row),
        ],  __('app.data_returned_successfully'));
    }

    public function search(Request $request){
        $data=$this->repo->search($request->name);
        return responseSuccess([
                'data' => OfferResource::collection($data),
            ],  __('app.data_returned_successfully'));
    }

    public function mybooks(){
        $current=$this->repo->getCurrent();
        $previous=$this->repo->getPrevious();
        return responseSuccess([
                'data' => [
                    'current' => BookResource::collection($current),
                    'previous' => BookResource::collection($previous),
                ],
            ],  __('app.data_returned_successfully'));
    }

    public function book(OfferRequest $request){

       $book=Book::where('offer_id',$request->offer_id)->where('user_id',auth()->user()->id)->where('date',$request->date)->first();
       if($book){
        return response()->json([
            "success" => false,
            "message" => __('admin/app.you_are_booked_this_offer_befor')
        ], 200);
       }
       $offer=$this->repo->findOrFail($request->offer_id);
        if($request->paid_type=='full'){
            $price=$offer->price;
            $data=[
                'offer_id'=>$request->offer_id,
                'date'=>$request->date,
                'paid_price'=>$offer->price,
                'user_id'=>auth()->id(),
                'paid'=>false,
            ];
        }else{
            $price=$offer->min_price;
            $data=[
                'offer_id'=>$request->offer_id,
                'date'=>$request->date,
                'paid_price'=>$offer->min_price,
                'user_id'=>auth()->id(),
                'paid'=>false,
            ];
        }
        $result=Book::create($data);
        $message=__('admin/app.we_receive_your_order').' '.$result->id.' '.__('admin/app.please_traslate').' '.$price.' '.__('admin/app.on_vodafone').' '.websiteInfo('phoneCach');
        return responseSuccess([
            'data' => [
                'order_no'=>$result->id,
                'phone_cach'=>websiteInfo('phoneCach'),
                'customer_service'=>websiteInfo('phones'),
                'facebook'=>websiteInfo('fb_link'),
        ],
        ],  __('app.data_returned_successfully'));
    }

    public function userbooks(){
        $data=Book::where('user_id',auth()->user()->id)->get();
        return responseSuccess([
            'data' => BookResource::collection($data),
        ],  __('app.data_returned_successfully'));
    }
    public function cancelBook($book_id){
        $data=Book::find($book_id);
        if($data){
            $data->status='canceled';
            $data->save();
            return response()->json([
                "success" => true,
                "message" => __('app.data_returned_successfully')
            ], 200);
        }
        return response()->json([
            "success" => false,
            "message" => __('admin/app.some_thing_error')
        ], 200);
    }

}
