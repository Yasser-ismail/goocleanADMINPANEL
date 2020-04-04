<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', User::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('user'));
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation[''] = '';

        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('users.attributes.'),
        ];
    }
}
