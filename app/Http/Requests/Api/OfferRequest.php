<?php

namespace App\Http\Requests\Api;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class OfferRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
                    'paid_type' => 'required|in:full,part',
                    'date' => 'required|date',
                ];
            }
            case 'PATCH':
            case 'PUT':
            {
                return [
                    'offer_id' => 'required|exists:offers,id',
                    'paid_type' => 'required|in:full,part',
                    'date' => 'required|date',
                ];
            }
            default:
                break;
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(responseFail('Validation Error', 401, $errors));
    }

}
