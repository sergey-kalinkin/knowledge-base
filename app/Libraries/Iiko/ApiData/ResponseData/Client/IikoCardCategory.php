<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Client;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property boolean $isActive
 * @property boolean $isDefaultForNewGuests
 * @property boolean $isBelongToLoyaltyProgram
 * @property string $name
 */
class IikoCardCategory extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'isActive' => 'required|boolean',
            'isDefaultForNewGuests' => 'required|boolean',
            'name' => 'required|string',
            'isBelongToLoyaltyProgram' => 'required|boolean',
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
