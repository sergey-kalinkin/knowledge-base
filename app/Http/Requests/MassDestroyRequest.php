<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRequest extends FormRequest
{
    public function authorize()
    {


        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'min:1|integer',
        ];
    }

    public function getIds()
    {
        return $this->input('ids', []);
    }
}
