<?php

namespace App\Http\Requests;

use App\Models\Appoientment;
use Illuminate\Support\Facades\Gate;

class AppoientmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', Appoientment::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('appoientment'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation['company_id'] = 'required';
        $validation['client_id'] = 'required';
        $validation['city_id'] = 'required';
        $validation['workinghour_id'] = 'required';
        $validation['time_id'] = 'required';
        $validation['address'] = 'required|string';
        $validation['service_id'] = 'required';

        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('appoientments.attributes.'),
        ];
    }
}
