<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryHeader;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryStatusAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryTypeAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryStatusContract;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryTypeContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $id
 * @property integer $number
 * @property integer $sum
 * @property string|null $closeTime
 * @property string|null $cancelTime
 * @property string $operationDate
 * @property string $guestId
 * @property string|null $addressString
 * @property boolean|null $assessed
 */
class DeliveryHeader extends AData implements IDeliveryStatusContract, IDeliveryTypeContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'number' => 'nullable|integer',
            'sum' => 'required|integer',
            'status' => 'required|array',
            'type' => 'required|array',
            'closeTime' => 'nullable|date_format:Y-m-d H:i:s',
            'cancelTime' => 'nullable|date_format:Y-m-d H:i:s',
            'operationDate' => 'required|date_format:Y-m-d',
            'guestId' => 'required|string',
            'addressString' => 'nullable|string',
            'assessed' => 'nullable|boolean',
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


    public function getDeliveryStatuses(): DeliveryStatusAdaptor
    {
        return new DeliveryStatusAdaptor(
            new IikoData($this->data['status'] ?? [])
        );
    }

    public function getDeliveryTypes(): DeliveryTypeAdaptor
    {
        return new DeliveryTypeAdaptor(
            new IikoData($this->data['type'] ?? [])
        );
    }
}
