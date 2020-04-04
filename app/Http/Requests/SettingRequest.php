<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Illuminate\Support\Facades\Gate;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', Setting::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('setting'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation['aboutus_des'] = 'required';
        $validation['aboutus_title'] = 'required';
        $validation['aboutus_content'] = 'required';

        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('settings.attributes.'),
        ];
    }
}
