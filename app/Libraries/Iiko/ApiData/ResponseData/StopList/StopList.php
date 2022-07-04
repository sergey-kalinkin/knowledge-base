<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\StopList;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\StopListItemAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IStopListItemContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $organizationId
 * @property string $deliveryTerminalId
 */
class StopList extends AData implements IStopListItemContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'organizationId' => 'required|string',
            'deliveryTerminalId' => 'required|string',
            'items' => 'required|array'
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

    public function getStopListItems(): StopListItemAdaptor
    {
        return new StopListItemAdaptor(
            new IikoData($this->data['items'] ?? [])
        );
    }
}
