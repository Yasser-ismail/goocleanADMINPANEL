<?php

namespace App\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Support\Facades\Gate;

class UpdateUserApiRequest extends FormRequest
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
            'name' => 'required|max:190',
            'image' => 'image',
            'email' => 'required|unique:users,email,' . auth()->id(),
            'phone_number' => 'required|unique:users,phone_number,' . auth()->id(),
        ];
    }

}
