<?php

namespace App\Http\Requests\Website;
use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
                    'email' => 'required|email|min:2|unique:subscriptions,email'
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'email' => 'required|email|min:2|unique:subscriptions,email'
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [ ];
    }

}


