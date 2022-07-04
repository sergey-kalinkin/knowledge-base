<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {


        return true;
    }

    public function rules()
    {
        return [
            'title'         => [
                'required',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions'   => [
                'required',
                'array',
            ],
        ];
    }

    public function getName(): array
    {
        return ['title' => $this->input('title')];
    }

    public function getPermissions(): array
    {
        return $this->input('permissions');
    }
}
