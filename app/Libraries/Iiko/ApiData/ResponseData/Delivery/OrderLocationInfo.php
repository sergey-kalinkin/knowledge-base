<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;

/**
 * @property numeric $latitude
 * @property numeric $longitude
 */
class OrderLocationInfo extends \App\Libraries\AbstractElements\AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric'
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
