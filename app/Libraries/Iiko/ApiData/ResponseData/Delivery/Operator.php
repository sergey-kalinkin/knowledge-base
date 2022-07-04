<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property string|null $displayName
 * @property string|null $firstName
 * @property string|null $middleName
 * @property string|null $lastName
 * @property string|null $phone
 * @property string|null $cellPhone
 * @property string|null $email
 * @property integer|null $externalRevision
 */
class Operator extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'displayName' => 'nullable|string',
            'firstName' => 'nullable|string',
            'middleName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'phone' => 'nullable|string',
            'cellPhone' => 'nullable|string',
            'email' => 'nullable|string',
            'externalRevision' => 'nullable|integer',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function messages(): array
    {
        return [

        ];
    }
}
