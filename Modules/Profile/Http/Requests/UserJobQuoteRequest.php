<?php

namespace Modules\Profile\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserJobQuoteRequest extends FormRequest
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
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'upload_file' => 'required|max:4500',
            'upload_file.*' => 'mimetypes:mimes:zip',
            'quote_best_deadline' => 'required|date',
            'quote_title' => 'required|string',
            'quote_price' => 'required|numeric|min:1|max:25000'
            // 'project_id' => 'required|integer'
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
            'upload_file' => 'quote_path'
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
            'upload_file.mimetypes' => 'Le fichier doit être au format zîp',
            'upload_file.uploaded' => 'Le ficbier a bien été téléchargé.',
        ];
    }
}
