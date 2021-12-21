<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'plate_number' => ['string', 'required', 'unique:cars', 'max:20', 'min:6'],
            'owner_id' => ['required'],
            'year' => ['required', 'date'],
            "brand" => ['present'],
            "model" => ['present'],
            "color" => ['present']
        ];
    }
}
