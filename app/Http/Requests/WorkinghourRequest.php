<?php

namespace App\Http\Requests;

use App\Models\Workinghour;
use Illuminate\Support\Facades\Gate;

class WorkinghourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', Workinghour::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('workinghour'));
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
        $validation['city_id'] = 'required';
        $validation['date'] = 'required|date|after:yesterday';
        $validation['start'] = 'required|';
        $validation['end'] = 'required';
        $validation['interval'] = 'required|numeric';

        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('workinghours.attributes.'),
        ];
    }
}
