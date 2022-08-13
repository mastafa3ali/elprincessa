<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
                    'offer_id' => 'required|exists:offers,id',
                    'user_id' => 'required|exists:users,id',
                    'paid_price' => 'required|numeric',
                    'date' => 'required|date',
                    'time' => 'required|date_format:H:i',

                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'offer_id' => 'required|exists:offers,id',
                    'user_id' => 'required|exists:users,id',
                    'paid_price' => 'required|numeric',


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


