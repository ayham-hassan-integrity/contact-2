<?php

namespace App\Domains\Person\Http\Requests\Backend\Person;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StorePersonRequest.
 */
class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the person is authorized to make this request.
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
            'name with type string'=>'nullable',
            'description'=>'nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}