<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class Myservice extends Component
{
    public $data=[];
    public $show;
    public $showEdit;
    public $row_id;

    public function render()
    {
        $this->data=Book::where('user_id',auth()->user()->id)->get();
        return view('livewire.myservice',get_defined_vars());
    }

    public function delete(){
        $row=Book::find($this->row_id);
        if($row){

            $row->delete();
            $this->doClose();
            session()->flash('success', __('تم حذف الحجز بنجاح'));
        }

        $this->data=Book::where('user_id',auth()->user()->id)->get();

    }
    public function cancel(){
        $row=Book::find($this->row_id);
        if($row){
        if($row->status=='completed'){
            session()->flash('error', __('هذا الحجز مكتمل بالفعل!!'));
        }else{

            $row->status='canceled';
            $row->save();
            session()->flash('success', __('تم الغاء الحجز بنجاح'));
        }
        $this->doCloseEdit();
        }

        $this->data=Book::where('user_id',auth()->user()->id)->get();

    }
    public function doShow($id) {
        $this->row_id=$id;
        $this->show = true;
    }
    public function doShowEdit($id) {
        $this->row_id=$id;
        $this->showEdit = true;
    }

    public function doClose() {
        $this->show = false;
    }
    public function doCloseEdit() {
        $this->showEdit = false;
    }


}

