<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
                    'price' => 'required|numeric',
                    'befor_discount' => 'required|numeric',
                    'min_price' => 'required|numeric',
                    'photo' => 'required',
                    'photo.*' =>'required|image|mimes:jpeg,bmp,png|max:4096',
                    'description' => 'string|min:2|nullable',
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'name' => 'required|string|min:2',
                    'price' => 'required|numeric',
                    'min_price' => 'required|numeric',
                    'photo.*'=>'image|mimes:jpeg,bmp,png|max:4096|nullable',
                    'description' => 'string|min:2|nullable',
                ];
            }
            default:break;
        }
    }

    public function messages()
    {

        return [
            'name.required' => __('admin/validation.name ar is required!'),
            'description.unique' => __('admin/validation.description is unique!'),
            'photo.required' => __('admin/validation.photo is required!'),
            'photo.image' => __('admin/validation.photo is image!')
        ];

    }

}


