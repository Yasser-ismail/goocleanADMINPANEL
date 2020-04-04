<?php

namespace App\Http\Requests;

use App\Models\Service;
use Illuminate\Support\Facades\Gate;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', Service::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('service'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation['name'] = 'required|string';
        $validation['price'] = 'required|numeric';
        if ($this->isCreateRequest()){
            $validation['image'] = 'required|image';
        }elseif ($this->isUpdateRequest()){
            $validation['image'] = 'nullable|image';
        }


        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('services.attributes.'),
        ];
    }
}
