<?php

namespace App\Libraries\Iiko\ApiData\ResponseData;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property string|null $login
 * @property string|null $pwHash
 * @property string|null $lastName
 * @property string|null $firstName
 * @property string|null $middleName
 * @property string|null $displayName
 */
class Employee extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'login' => 'nullable|string',
            'pwHash' => 'nullable|string',
            'lastName' => 'nullable|string',
            'firstName' => 'nullable|string',
            'middleName' => 'nullable|string',
            'displayName' => 'nullable|string',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function messages(): array
    {
        return [
            //TODO
        ];
    }
}
