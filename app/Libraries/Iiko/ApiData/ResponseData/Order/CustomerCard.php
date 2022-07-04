<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Order;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property string $track
 * @property string|null $number
 * @property boolean $isActivated
 * @property string $organizationId
 */
class CustomerCard extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'track' => 'required|string',
            'number' => 'nullable|string',
            'isActivated' => 'required|boolean',
            'organizationId' => 'required|string',
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
