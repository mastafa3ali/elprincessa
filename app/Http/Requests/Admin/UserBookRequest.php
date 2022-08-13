<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class UserBookRequest extends FormRequest
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
                    'paid' => 'required|in:min_price,price'

                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'offer_id' => 'required|exists:offers,id',
                    'paid' => 'required|in:min_price,price'


                ];
            }
            default:break;
        }
    }

    public function messages()
    {

        return [
            'paid.required' => 'اختر طريقة الدفع',
            'paid.in' => 'اختر طريقة الدفع الصحيحة',
        ];

    }

}


