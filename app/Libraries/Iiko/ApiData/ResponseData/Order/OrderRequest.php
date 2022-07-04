<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Order;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\CustomerAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OrderAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\ICustomerContract;
use App\Libraries\Iiko\ApiData\DataContracts\IOrderContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $organization
 * @property string $deliveryTerminalId
 * @property string|null $coupon
 * @property string[]|null $availablePaymentMarketingCampaignIds
 * @property string[]|null $applicableManualConditions
 * @property string|null $customData
 * @property string|null $emailForFailedOrderInfo
 */
class OrderRequest extends AData implements ICustomerContract, IOrderContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'organization' => 'required|string',
            'deliveryTerminalId' => 'nullable|string',
            'customer' => 'required|array',
            'order' => 'required|array',
            'coupon' => 'nullable|string',
            'availablePaymentMarketingCampaignIds' => 'nullable|array',
            'availablePaymentMarketingCampaignIds.*' => 'string',
            'applicableManualConditions' => 'nullable|array',
            'applicableManualConditions.*' => 'string',
            'customData' => 'nullable|string',
            'emailForFailedOrderInfo' => 'nullable|string',
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

    public function getAllValidData(): ?array
    {
        //
        $order_request = parent::getAllValidData();

        //
        $customers = static::retrieveAllValidData(
            static::getCustomers()
        );

        //
        $orders = static::retrieveAllValidData(
            static::getOrders()
        );

        return array_merge(
            $order_request,
            ['customer' => $customers[0] ?? null],
            ['order' => $orders[0] ?? null]
        );
    }

    public function getCustomers(): CustomerAdaptor
    {
        return new CustomerAdaptor(
            new IikoData($this->data['customer'] ?? [])
        );
    }

    public function getOrders(): OrderAdaptor
    {
        return new OrderAdaptor(
            new IikoData($this->data['order'] ?? [])
        );
    }
}
