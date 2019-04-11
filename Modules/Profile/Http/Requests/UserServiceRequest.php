<?php

namespace Modules\Profile\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserServiceRequest extends FormRequest
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
            'service_id' => 'required|integer',
            // 'user_id' => 'required|integer',
            'min_rate' => 'required|numeric|min:0|nullable',
            'max_rate' => 'required|numeric|max:100|nullable',
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
            'service_id.required' => 'A service is required',
            'max_rate.required' => 'A max rate is required',
            'min_rate.required' => 'A min rate is required',
            // Not required since it's checked by the controller
            //'user_id.required' => 'A User is required',
            'status_id.required' => 'A status is required',
            'visibility_id.required' => 'A visiblity is required',
        ];
    }
}
