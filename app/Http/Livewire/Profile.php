<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $phone;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'sometimes|unique:users,phone,NULL,id,deleted_at,NULL' . auth()->id(),
            'password' => 'nullable|min:8|confirmed'
        ];
    }

    public function mount(){
        $this->name=auth()->user()->name;
        $this->phone=auth()->user()->phone;
    }   
    public function render()
    {
        return view('livewire.profile');
    }
    public function update(){
        $this->validate();
        $phoneexist=User::where('user_id','!=',auth()->user()->id)->where('phone',$this->phone)->first();
        if($phoneexist){
            return session()->flash('error', __('رقم الهاتف مستخدم من قبل'));
        }
        if($this->password){
           $data['password']=Hash::make($this->password);
        }
        $currentUser = User::findOrFail(auth()->user()->id);
        $data['name']=$this->name;
        $data['phone']=$this->phone;
        $currentUser->update($data);
        session()->flash('success', __('تم التحديث  بنجاح'));

    }
}
