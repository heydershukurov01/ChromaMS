<?php

namespace ChromaMS\Http\Requests;

use ChromaMS\Http\Requests\Request;

class StoreUserRequest extends Request
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
            //Validation Rules
            'name'      => ['required'],
            'email'     => ['required' , 'email' , 'unique:users'],
            'password'  => ['required' , 'confirmed']
        ];
    }
}
