<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $crmId
 * @property string|null $technicalInformation
 * @property string $deliveryTerminalId
 * @property string $restaurantName
 * @property string $address
 * @property integer|null $externalRevision
 */
class DeliveryTerminal extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'crmId' => 'required|string',
            'externalRevision' => 'nullable|integer',
            'technicalInformation' => 'nullable|string',
            'deliveryTerminalId' => 'required|string',
            'restaurantName' => 'required|string',
            'address' => 'required|string',
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
