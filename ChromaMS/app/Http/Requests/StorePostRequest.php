<?php

namespace ChromaMS\Http\Requests;

use ChromaMS\Http\Requests\Request;

class StorePostRequest extends Request
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
            //Validator For Blog Posts
            'title'         => ['required'],
            'slug'          => ['required'],
            'published_at'  => ['date_format:Y-m-d H:i:s'],
            'body'          => ['required'],
        ];
    }
}
