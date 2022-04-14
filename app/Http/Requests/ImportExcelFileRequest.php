<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportExcelFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'excelfile' => 'required|mimes:xlsx,xls'
        ];
    }

    public function messages()
    {
        return [
            'excelfile.required' => "File Field Is Required",
            'excelfile.mimes' => "File Format Must Be xls, xlsx",
        ];
    }
}
