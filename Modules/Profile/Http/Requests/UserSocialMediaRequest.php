<?php

namespace Modules\Profile\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserSocialMediaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        // return backpack_auth()->check();
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'socialmedia_id' => 'required|integer',
            'account' => 'required|string',
            // 'user_id' => 'required|integer',
            'status_id' => 'required|boolean',
            'visibility_id' => 'required|boolean'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'socialmedia_id.required' => 'Un média social est requis',
            'account.required' => 'L\'identifiant de votre compte est requis',
            // Not required since it's checked by the controller
            //'user_id.required' => 'A User is required',
            'status_id.required' => 'Vous devez définir le statut actif / inactif',
            'visibility_id.required' => 'Vous devez définir le statut visible / invisible',
        ];
    }
}
