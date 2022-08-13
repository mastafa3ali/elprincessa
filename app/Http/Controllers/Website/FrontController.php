<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Contact;
use App\Models\Offer;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{


    public function index()
    {
        $offers=Offer::where('active',1)->get();
        $services=Service::where('active',1)->get();
        return view('front.index',compact('offers','services'));
    }

    public function about()
    {
        return view('front.about');
    }
    public function myservice()
    {
        return view('front.myservice');
    }
    public function profile()
    {
        return view('front.profile');
    }
    public function policy()
    {
        return view('front.police');
    }
    public function offers()
    {
        $offers=Offer::where('active',1)->get();

        return view('front.offers',compact('offers'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function ourservices()
    {
        $services=Service::where('active',1)->get();

        return view('front.services',compact('services'));
    }

    public function saveContact(Request $request)
    {

        try {
            $orders = new Contact();
            $orders->name = $request->name;
            $orders->email = $request->email;
            $orders->subject = $request->subject;
            $orders->message = $request->msg;
            $data = $orders->save();
            if ($data) {
                $response = ['code' => 1, 'msg' => __('admin/app.your_data_send_successfully')];
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

    public function create()
    {

    }
    public function offerDetails($offer)
    {
      $row=Offer::find($offer);
      $offers=Offer::where('active',1)->get();
    if($offer){
        return view('front.offer-details',compact('row','offers'));
    }
    return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
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
            // DB::rollback();
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
    public function update(Request $request,$id)
    {


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
        //    DB::rollback();
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



}


