<?php

namespace ChromaMS\Http\Requests;

use ChromaMS\Http\Requests\Request;

class UpdatePageRequest extends Request
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
            //Validator For Pages 
        'title' => ['required'],
        'uri' => ['required' , 'unique:pages,uri,'.$this->route('pages')],
        'name' => ['unique:pages,name,'.$this->route('pages')],
        'content' => ['required'],
        ];
    }
}
