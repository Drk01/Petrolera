<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlmacenStoreRequest extends FormRequest
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
            'partNumber' => 'required|unique:storage,partNumber',
            'productName' => 'required',
            'description' => 'required',
            'observations' => '',
            'trademark' => 'required|numeric|exists:trademark,id',
            'driveType' => 'required|exists:driveType,id',
            'cunit' => 'required|numeric',
            'units' => 'required|numeric|exists:units,id',
            'enviroment' => 'required|exists:enviroment,id',
            'ubication' => 'required|numeric|exists:enviroment,id',
            'uses' => 'required|numeric|exists:usage,id',
            'trash' => 'required|numeric|exists:trashType,id',
            'responsable' => 'required|numeric|exists:users,id'
        ];
    }
}
