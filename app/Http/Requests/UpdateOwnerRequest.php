<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerRequest extends FormRequest
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
            'uid' => ['string', 'required', 'unique:owners,uid' . $this->owner->uid, 'min:6', 'max:20'],
            'first_name' => ['present'],
            'last_name' => ['present']
        ];
    }
}
