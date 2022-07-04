<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $city
 * @property string $street
 * @property string|null $streetId
 * @property string|null $streetClassifierId
 * @property string|null $index
 * @property string $home
 * @property string|null $apartment
 * @property string|null $entrance
 * @property string|null $floor
 * @property string|null $doorphone
 * @property string|null $comment
 * @property string|null $regionId
 * @property string|null $externalCartographyId
 */
class Address extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'city' => 'required|string',
            'street' => 'required|string',
            'streetId' => 'nullable|string',
            'streetClassifierId' => 'nullable|string',
            'index' => 'nullable|string',
            'home' => 'required|string',
            'housing' => 'nullable|string',
            'apartment' => 'nullable|string',
            'entrance' => 'nullable|string',
            'floor' => 'nullable|string',
            'doorphone' => 'nullable|string',
            'comment' => 'nullable|string',
            'regionId' => 'nullable|string',
            'externalCartographyId' => 'nullable|string',
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
