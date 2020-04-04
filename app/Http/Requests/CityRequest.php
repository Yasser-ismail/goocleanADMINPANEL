<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Support\Facades\Gate;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', City::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('city'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isCreateRequest()){
            $validation['name'] = 'required|unique:cities';
        }elseif ($this->isUpdateRequest()){
            $validation['name'] = 'required|unique:cities,name,'.$this->city->id;
        }


        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('cities.attributes.'),
        ];
    }
}
