<?php

namespace Modules\Profile\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserOrganizationRequest extends FormRequest
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
            'organization_id' => 'required|integer',
            // 'user_id' => 'required|integer',
            'status_id' => 'boolean',
            'visibility_id' => 'boolean',
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
            'organization_id.required' => 'Une organisation est requise required',
            'user_id.required' => 'A User is required',
            'status_id.required' => 'A status is required',
            'visibility_id.required' => 'A visiblity is required',
        ];
    }
}
