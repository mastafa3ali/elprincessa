<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                    'name' => 'required|string|min:2',
                    'photo'=>'required|image|mimes:jpeg,bmp,png|max:4096',
                    'description' => 'string|min:2|nullable'
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'name' => 'required|string|min:2',
                    'photo'=>'sometimes|nullable|mimes:jpeg,bmp,png|max:4096',
                    'description' => 'string|min:2|nullable'
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required!',
            'description.unique' => 'description is unique!',
            'photo.image' => 'photo is image!'
        ];
    }

}


