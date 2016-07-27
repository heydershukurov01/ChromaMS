<?php

namespace ChromaMS\Http\Requests;

use ChromaMS\Http\Requests\Request;

class DeleteUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route('users') == auth()->user()->id){
            return false;    
        }else{
            return true;
        }
    }

    public function forbiddenResponse()
    {

        return redirect()->back()->withErrors([
            'error' => 'You are not able to delete yourself!'
        ]);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
