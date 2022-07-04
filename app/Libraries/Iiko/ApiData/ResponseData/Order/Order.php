<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Order;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\AddressAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ComboInfoAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\PaymentAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ProductAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IAddressContract;
use App\Libraries\Iiko\ApiData\DataContracts\IComboInfoContract;
use App\Libraries\Iiko\ApiData\DataContracts\IPaymentContract;
use App\Libraries\Iiko\ApiData\DataContracts\IProductContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string|null $id
 * @property string|null $externalId
 * @property string|null $date
 * @property string $phone
 * @property boolean|null $isSelfService
 * @property string|null $orderTypeId
 * @property string|null $comment
 * @property string|null $conception
 * @property integer|null $personsCount
 * @property string|null $marketingSource
 * @property string|null $marketingSourceId
 * @property string|null $discountCardTypeId
 * @property string|null $discountCardSlip
 * @property string|null $discountOrIncreaseSum
 */
class Order extends AData implements IProductContract, IPaymentContract, IAddressContract, IComboInfoContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'nullable|string',
            'externalId' => 'nullable|string',
            'date' => 'nullable|date_format:Y-m-d H:i:s',
            'items' => 'required|array',
            'paymentItems' => 'required|array',
            'phone' => 'required|string',
            'isSelfService' => 'nullable|boolean',
            'orderTypeId' => 'nullable|string',
            'address' => 'nullable|array',
            'comment' => 'nullable|string',
            'conception' => 'nullable|string',
            'personsCount' => 'nullable|integer',
            'marketingSource' => 'nullable|string',
            'marketingSourceId' => 'nullable|string',
            'discountCardTypeId' => 'nullable|string',
            'discountCardSlip' => 'nullable|string',
            'discountOrIncreaseSum' => 'nullable|string',
            'orderCombos' => 'nullable|array',
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

    public function getAllValidData(): ?array
    {
        //
        $order = parent::getAllValidData();

        //
        $addresses = static::retrieveAllValidData(
            static::getAddresses()
        );

        //
        $products = static::retrieveAllValidData(
            static::getProducts()
        );

        //
        $payments = static::retrieveAllValidData(
            static::getPayments()
        );

        //
        $combo_info = static::retrieveAllValidData(
            static::getComboInfo()
        );

        return array_merge(
            $order,
            ['address' => $addresses[0]  ?? null],
            ['items' => $products ?? null],
            ['paymentItems' => $payments ?? null],
            !empty($combo_info) ? ['orderCombos' => $combo_info] : []
        );
    }

    public function getAddresses() : AddressAdaptor
    {
        return new AddressAdaptor(
            new IikoData($this->data['address'] ?? [])
        );
    }

    public function getProducts(): ProductAdaptor
    {
        return new ProductAdaptor(
            new IikoData($this->data['items'] ?? [])
        );
    }

    public function getPayments(): PaymentAdaptor
    {
        return new PaymentAdaptor(
            new IikoData($this->data['paymentItems'] ?? [])
        );
    }

    public function getComboInfo(): ComboInfoAdaptor
    {
        return new ComboInfoAdaptor(
            new IikoData($this->data['orderCombos'] ?? [])
        );
    }
}
