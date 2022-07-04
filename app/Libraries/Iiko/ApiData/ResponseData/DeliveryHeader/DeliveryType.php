<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryHeader;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $name
 * @property string $description
 * @property string $orderServiceType
 */
class DeliveryType extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'orderServiceType' => 'required|string',
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
