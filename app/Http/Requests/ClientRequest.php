<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Support\Facades\Gate;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->isCreateRequest()) {
            return Gate::allows('create', Client::class);
        } elseif ($this->isUpdateRequest()) {
            return Gate::allows('update', $this->route('client'));
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
            $validation['email'] = ['required','unique:clients', 'email'];
            $validation['phone'] = ['required', 'unique:clients','string', 'max:14', 'min:14'];
        }elseif ($this->isUpdateRequest()){
            $validation['email'] = ['required', 'email', 'unique:clients,email,'. $this->client];
            $validation['phone'] = ['required', 'string', 'max:14', 'min:14', 'unique:clients,phone,'. $this->client];
        }
        $validation['city_id'] = ['required'];

        return $validation;
    }

    public function attributes()
    {
        return [
            '' => __('clients.attributes.'),
        ];
    }
}
