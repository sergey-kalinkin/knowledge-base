<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property boolean $needReceipt
 * @property string $phone
 * @property string|null $email
 * @property string|null $settlementPlace
 */
class ChequeAdditionalInfo extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'needReceipt' => 'required|boolean',
            'phone' => 'required|string',
            'email' => 'nullable|string',
            'settlementPlace' => 'nullable|string',
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
