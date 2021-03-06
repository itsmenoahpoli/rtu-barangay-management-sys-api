<?php

namespace App\Http\Requests\Residents;

use Illuminate\Foundation\Http\FormRequest;

class ResidentRecordRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'first_name' => 'required|string',
                    'middle_name' => 'string',
                    'last_name' => 'required|string',
                    'email' => 'required|email|unique:resident_records',
                ];
        }
    }
}
