<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
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
                    'value' => 'required|string|max:5|min:1',
                    'photo' => 'nullable|sometimes|image',
                    'user_id' => 'required|exists:users,id',
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'value' => 'required|string|max:5|min:1',
                    'photo' => 'nullable|sometimes|image',
                    'user_id' => 'required|exists:users,id',

                ];
            }
            default:
                break;
        }
    }

    public function messages()
    {
        return [
            'title_ar.required' => 'title ar is required!',
            'title_en.required' => 'title en is required!',
            'description_ar.unique' => 'description ar is unique!',
            'description_en.unique' => 'description en is unique!',
            'photo.required' => 'photo is required!',
            'photo.image' => 'photo is image!'
        ];
    }

}


