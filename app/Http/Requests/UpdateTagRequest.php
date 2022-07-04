<?php

namespace App\Http\Requests;

use App\Tag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateTagRequest extends FormRequest
{
    public function authorize()
    {


        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'slug' => [
                'required', 'unique:tags,slug,'.$this->route('tag')->id
            ],
        ];
    }
}
