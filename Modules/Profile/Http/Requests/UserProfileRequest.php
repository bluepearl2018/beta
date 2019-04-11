<?php

namespace Modules\Profile\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return auth()->check();
        // return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'user_id' => ['required', 'integer'],
            'gender_id' => ['required', 'integer'],
            'address1' => ['required', 'string', 'max:191'],
            'address2' => ['max:191', 'string', 'nullable'],
            'postal_code' => ['required', 'string', 'min:3', 'max:12'],
            'city' => ['required', 'min:3'],
            'state' => ['required', 'string'],
            'country_id' => ['integer'],
            'phone' => ['required', 'string', 'min:9', 'max:18'],
            'mobile' => ['required', 'string', 'min:9', 'max:18'],
            'secondaryemail' => ['required', 'string', 'email', 'max:191']
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
            //
        ];
    }
}
