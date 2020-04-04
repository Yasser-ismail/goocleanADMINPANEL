<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Support\Facades\Gate;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', Company::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('company'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation['name'] = ['required', 'string'];
        if ($this->isCreateRequest()){
            $validation['email'] = 'required|unique:companies|email';
            $validation['phone'] = 'required|unique:companies|string|max:14|min:14';
        }elseif ($this->isUpdateRequest()){
            $validation['email'] = 'required|email|unique:companies,email,'.$this->company->id;
            $validation['phone'] = 'required|string|max:14|min:14|unique:companies,phone,'.$this->company->id;
        }
        $validation['service_id'] = 'required';
        $validation['city_id'] = 'required';

        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('companies.attributes.'),
        ];
    }
}
