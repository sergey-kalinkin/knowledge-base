<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;
use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ChequeAdditionalInfoAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\PaymentTypeAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IChequeAdditionalInfoContract;
use App\Libraries\Iiko\ApiData\DataContracts\IPaymentTypeContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string|null $additionalData
 * @property boolean|null $isExternal
 * @property boolean|null $isPreliminary
 * @property boolean $isProcessedExternally
 * @property integer $sum
 */
class PaymentItem extends AData implements IPaymentTypeContract, IChequeAdditionalInfoContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'additionalData' => 'nullable|string',
            'isExternal' => 'nullable|boolean',
            'isPreliminary' => 'nullable|boolean',
            'isProcessedExternally' => 'required|boolean',
            'paymentType' => 'required|array',
            'sum' => 'required|integer',
            'chequeAdditionalInfo' => 'nullable|array',
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
        $payment_item = parent::getAllValidData();

        //
        $payment_types = static::retrieveAllValidData(
            static::getPaymentType()
        );

        //
        $ads = static::retrieveAllValidData(
            static::getChequeAdditionalInfo()
        );

        return array_merge(
            $payment_item,
            ['paymentType' => $payment_types[0] ?? null],
            ['chequeAdditionalInfo' => $ads[0] ?? null]
        );
    }

    public function getPaymentType(): PaymentTypeAdaptor
    {
        return new PaymentTypeAdaptor(
            new IikoData($this->data['paymentType'] ?? [])
        );
    }

    public function getChequeAdditionalInfo(): ChequeAdditionalInfoAdaptor
    {
        return new ChequeAdditionalInfoAdaptor(
            new IikoData($this->data['chequeAdditionalInfo'] ?? [])
        );
    }
}
