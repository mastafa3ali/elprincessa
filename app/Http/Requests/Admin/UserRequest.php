<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {


        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|string|max:255',
                    'type' => 'required|in:support,customer',
                    'phone' => 'sometimes|unique:users,phone,NULL,id,deleted_at,NULL' . $this->id,
                    'email' => 'required|email|max:255|unique:users,email,NULL,id,deleted_at,NULL' . $this->id,
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'name' => 'required|string|max:255',
                    'type' => 'required|in:support,customer',
                    'phone' => 'sometimes|unique:users,phone,NULL,id,deleted_at,NULL' . $this->id,
                    'email' => 'required|email|max:255|unique:users,email,NULL,id,deleted_at,NULL' . $this->id,
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required!',
            'email.required' => 'email is required!',
            'phone.required' => 'phone is required!',
            'image.required' => 'image is required!',
            'image.image' => 'image is image!'
        ];
    }

}


