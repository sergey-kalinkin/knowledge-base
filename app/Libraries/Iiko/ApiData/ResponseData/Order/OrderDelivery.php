<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\Order;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryReportItemAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryReportItemContract;
use App\Libraries\Iiko\ApiData\DataContracts\IOrderInfo;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * Class OrderDelivery
 * @package App\Libraries\Iiko\ApiData\ResponseData\Order
 *
 * @property string $id
 * @property string $typeId
 * @property int $status
 * @property string $courierId
 * @property string $operatorId
 * @property string $deliveryTerminalId
 * @property string $operationDate
 * @property boolean $delayAnalyzed
 */
class OrderDelivery extends AData implements IOrderInfo, IDeliveryReportItemContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'typeId' => 'required|string',
            'status' => 'required|integer',
            'courierId' => 'required|string',
            'operatorId' => 'required|string',
            'deliveryTerminalId' => 'required|string',
            'operationDate' => 'required|string',
            'orderInfo' => 'required|array',
            'analyzeResult' => 'required|array',
            'delayAnalyzed' => 'required|boolean',
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

    public function getOrderInfo(): DeliveryAdaptor
    {
        return new DeliveryAdaptor(
            new IikoData($this->data['orderInfo'] ?? [])
        );
    }

    public function getDeliveryReportItem(): DeliveryReportItemAdaptor
    {
        return new DeliveryReportItemAdaptor(
            new IikoData($this->data['analyzeResult'] ?? [])
        );
    }
}
