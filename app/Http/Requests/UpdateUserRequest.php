<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login'   => [
                'required',
                'bail',
                'exclude_if:login,' . request()->route('user')->login,
                'unique:followers,login,' . request()->route('user')->id,
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'exclude_if:password,null',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                'required',
                'array',
            ],
        ];
    }

    public function getCredentials(): array
    {
        return collect($this->validated())
            ->except('roles')
            ->toArray();
    }

    public function getRoles()
    {
        return $this->input('roles', []);
    }
}
