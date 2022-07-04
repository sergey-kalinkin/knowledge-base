<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryTerminal;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\CityAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\TerminalWorkingHoursAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\ICityContract;
use App\Libraries\Iiko\ApiData\DataContracts\ITerminalWorkingHoursContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property boolean|null $isDeleted
 * @property string $deliveryTerminalId
 * @property string $deliveryRestaurantName
 * @property string $address
 * @property string $organizationId
 * @property string $name
 * @property string|null $technicalInformation
 * @property string|null $deliveryGroupName
 * @property integer|null $externalRevision
 * @property integer|null $protocolVersion
 */
class CityDeliveryTerminal extends AData implements ITerminalWorkingHoursContract, ICityContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'isDeleted' => 'nullable|boolean',
            'deliveryTerminalId' => 'required|string',
            'deliveryRestaurantName' => 'required|string',
            'address' => 'required|string',
            'organizationId' => 'required|string',
            'name' => 'required|string',
            'technicalInformation' => 'nullable|string',
            'externalRevision' => 'nullable|integer',
            'protocolVersion' => 'nullable|integer',
            'deliveryGroupName' => 'nullable|string',
            'openingHours' => 'nullable|array',
            'city' => 'nullable|array'
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

    public function getCities(): CityAdaptor
    {
        return new CityAdaptor(
            new IikoData($this->data['city'] ?? [])
        );
    }

    public function getWorkingHours(): TerminalWorkingHoursAdaptor
    {
        return new TerminalWorkingHoursAdaptor(
            new IikoData($this->data['openingHours'] ?? [])
        );
    }
}
