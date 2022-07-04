<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\AddressAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\CancelCauseAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\CourierAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\CustomerAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryTerminalAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OperatorAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OrderLocationInfoAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\OrderTypeAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\PaymentAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ProblemInfoAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ProductAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IAddressContract;
use App\Libraries\Iiko\ApiData\DataContracts\ICourierContract;
use App\Libraries\Iiko\ApiData\DataContracts\ICustomerContract;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryCancelCauseContract;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryTerminalContract;
use App\Libraries\Iiko\ApiData\DataContracts\IOperatorContract;
use App\Libraries\Iiko\ApiData\DataContracts\IOrderLocationInfoContract;
use App\Libraries\Iiko\ApiData\DataContracts\IOrderTypeContract;
use App\Libraries\Iiko\ApiData\DataContracts\IPaymentContract;
use App\Libraries\Iiko\ApiData\DataContracts\IProblemInfoContract;
use App\Libraries\Iiko\ApiData\DataContracts\IProductContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string|null $actualTime
 * @property string|null $billTime
 * @property string|null $cancelTime
 * @property string|null $closeTime
 * @property string|null $confirmTime
 * @property string|null $deliveryDate
 * @property string|null $createdTime
 * @property string|null $printTime
 * @property string|null $sendTime
 * @property string|null $comment
 * @property string|null $customerId
 * @property string|null $deliveryCancelComment
 * @property string|null $iikoCard5Coupon
 * @property string $orderId
 * @property string|null $status
 * @property string|null $statusCode
 * @property string|null $organization
 * @property integer|null $discount
 * @property integer|null $personsCount
 * @property integer|null $number
 * @property integer|null $sum
 * @property integer|null $durationInMinutes
 * @property boolean|null $splitBetweenPersons
 * @property string|null $customData
 */
class Delivery extends AData
    implements IAddressContract, ICourierContract, ICustomerContract,
                IDeliveryCancelCauseContract, IDeliveryTerminalContract, IProductContract,
                IOperatorContract, IOrderLocationInfoContract, IOrderTypeContract,
                IPaymentContract, IProblemInfoContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'actualTime' => 'nullable|date_format:Y-m-d H:i:s',
            'address' => 'nullable|array',
            'billTime' => 'nullable|date_format:Y-m-d H:i:s',
            'cancelTime' => 'nullable|date_format:Y-m-d H:i:s',
            'closeTime' => 'nullable|date_format:Y-m-d H:i:s',
            'comment' => 'nullable|string',
            'confirmTime' => 'nullable|date_format:Y-m-d H:i:s',
            'courierInfo' => 'nullable|array',//TODO location data
            'createdTime' => 'nullable|date_format:Y-m-d H:i:s',
            'customer' => 'nullable|array',
            'customerId' => 'nullable|string',
            'deliveryCancelCause' => 'nullable|array',
            'deliveryCancelComment' => 'nullable|string',
            'deliveryDate' => 'nullable|date_format:Y-m-d H:i:s',
            'deliveryTerminal' => 'required_without:deliveryTerminalInfo|array',
            'deliveryTerminalInfo' => 'required_without:deliveryTerminal|array',
            'discount' => 'nullable|integer',
            'iikoCard5Coupon' => 'nullable|string',
            'organization' => 'nullable|string',
            'items' => 'required|array|min:1',
            'number' => 'nullable|integer',
            'operator' => 'nullable|array',
            'conception' => 'nullable|array',//TODO
            'marketingSource' => 'nullable|array',//TODO
            'guests' => 'nullable|array',//TODO
            'discounts' => 'nullable|array',//TODO
            'orderId' => 'required|string',
            'orderLocationInfo' => 'nullable|array',
            'orderType' => 'nullable|array',
            'payments' => 'required|array|min:1',
            'personsCount' => 'nullable|integer',
            'printTime' => 'nullable|date_format:Y-m-d H:i:s',
            'problem' => 'nullable|array',
            'sendTime' => 'nullable|date_format:Y-m-d H:i:s',
            'status' => 'nullable|string',
            'statusCode' => 'nullable|string',
            'customData' => 'nullable|string',
            'sum' => 'nullable|integer',
            'durationInMinutes' => 'nullable|integer',
            'splitBetweenPersons' => 'nullable|boolean',
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

    public function getAddresses() : AddressAdaptor
    {
        return new AddressAdaptor(
            new IikoData($this->data['address'] ?? [])
        );
    }

    public function getCouriers(): CourierAdaptor
    {
        return new CourierAdaptor(
            new IikoData($this->data['courierInfo'] ?? [])
        );
    }

    public function getCustomers(): CustomerAdaptor
    {
        return new CustomerAdaptor(
            new IikoData($this->data['customer'] ?? [])
        );
    }

    public function getCancelCauses(): CancelCauseAdaptor
    {
        return new CancelCauseAdaptor(
            new IikoData($this->data['deliveryCancelCause'] ?? [])
        );
    }

    public function getDeliveryTerminals(): DeliveryTerminalAdaptor
    {
        return new DeliveryTerminalAdaptor(
            new IikoData($this->data['deliveryTerminal'] ?? $this->data['deliveryTerminalInfo'] ?? [])
        );
    }


    public function getProducts(): ProductAdaptor
    {
        return new ProductAdaptor(
            new IikoData($this->data['items'] ?? [])
        );
    }


    public function getOperators(): OperatorAdaptor
    {
        return new OperatorAdaptor(
            new IikoData($this->data['operator'] ?? [])
        );
    }

    public function getOrderLocationInfo(): OrderLocationInfoAdaptor
    {
        return new OrderLocationInfoAdaptor(
            new IikoData($this->data['orderLocationInfo'] ?? [])
        );
    }


    public function getOrderType(): OrderTypeAdaptor
    {
        return new OrderTypeAdaptor(
            new IikoData($this->data['orderType'] ?? [])
        );
    }

    public function getPayments(): PaymentAdaptor
    {
        return new PaymentAdaptor(
            new IikoData($this->data['payments'] ?? [])
        );
    }

    public function getProblemInfo(): ProblemInfoAdaptor
    {
        return new ProblemInfoAdaptor(
            new IikoData($this->data['problem'] ?? [])
        );
    }
}
