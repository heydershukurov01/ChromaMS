<?php

namespace ChromaMS\Http\Requests;

use ChromaMS\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            //For Updating Unique Email
            'name'      => ['required'],
            'email'     => ['required' , 'email' , 'unique:users,email,'.$this->route('users')],
            // With This line below u can give a statement if is password field blank not update if !blank update 
            'password'  => ['required_with:password_confirmation', 'confirmed']

        ];
    }
}
