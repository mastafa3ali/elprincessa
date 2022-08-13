<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\OfferRepo;
use App\Http\Requests\Admin\OfferRequest ;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File as FacadesFile;

class OfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repo;
    protected $namespaceName;
    protected $modelName;



    public function __construct(OfferRepo $repo)
    {
       $this->repo = $repo;
       $this->modelName = 'offers';
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
        return view($this->namespaceName.'.'.$this->modelName.'.index', compact('data','title'));
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */

    public function show($id)
    {
        $row=$this->repo->findOrFail($id);
        return view('admin.offers.show',compact('row'));
    }

    public function store(OfferRequest $request)
    {

      try {
            $data=$request->all();

            foreach($data as $key=>$val){
                $files=request()->file($key);
                if($files){
                    $filenames=[];
                    foreach($files as $file){
                        $filenames[]=$this->repo->storeFile($file,$this->modelName);
                    }
                    $data['photo']=json_encode($filenames);
                }
            }
            $data['user_id']=auth()->user()->id;
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
    public function update(OfferRequest $request,$id)
    {

        try {
            $data=$request->all();
            $item=$this->repo->findOrFail($request->id);

            foreach($data as $key=>$val){
                $files=request()->file($key);
                // if($file){
                //     FacadesFile::delete('public/'.$this->modelName.'/' . $item->photo);
                //     $data[$key]=$this->repo->storeFile($file,$this->modelName);
                // }
                if($files){
                    $filenames=[];
                    foreach($files as $file){
                        $filenames[]=$this->repo->storeFile($file,$this->modelName);
                    }
                    $data['photo']=json_encode($filenames);
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



}


