<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreatePhoneContactRequest
 * @package App\Http\Requests\Main
 */
class CreatePhoneContactRequest extends FormRequest
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
            'first_name' => 'required|string',
            'second_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'phone' => 'nullable|string',
            'description' => 'nullable|string',
            'is_favorite' => 'nullable|boolean',
        ];
    }
}
