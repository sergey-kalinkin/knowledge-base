<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property string $name
 * @property string $orderServiceType
 * @property integer|null $externalRevision
 */
class OrderType extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'name' => 'required|string',
            'orderServiceType' => 'required|string',
            'externalRevision' => 'nullable|integer',
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
