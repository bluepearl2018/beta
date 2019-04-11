<?php

namespace Modules\Profile\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserCertificateRequest extends FormRequest
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
            'file_mime' => 'bail|mimetypes:mimes:application/pdf',
            'visibility_id' => 'required|boolean',
            'status_id' => 'required|boolean'
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
            'file_path.mimetypes' => 'Le fichier doit être au format pdf, doc, docx ou text',
            'validation.uploaded' => 'Le ficbier a bien été téléchargé.',
        ];
    }
}
