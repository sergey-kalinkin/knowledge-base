<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\LogRequest;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property string|null $orderId
 * @property string $requestTime
 * @property string $requestDate
 * @property string $validationStatus
 * @property string $onlinePaymentStatus
 * @property string|null $paymentExpireTime
 * @property string $iikoBizStatus
 * @property string|null $iikoBizProcessTime
 * @property boolean|null $hasProblem
 * @property string|null $requestData
 * @property string|null $validationResult
 * @property string|null $iikoBizResponse
 */
class OrderCreationAttempt extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'orderId' => 'nullable|string',
            'requestTime' => 'required|date_format:Y-m-d H:i:s',
            'requestDate' => 'required|date_format:Y-m-d',
            'validationStatus' => 'required|string',
            'onlinePaymentStatus' => 'required|string',
            'paymentExpireTime' => 'nullable|date_format:Y-m-d H:i:s',
            'iikoBizStatus' => 'required|string',
            'iikoBizProcessTime' => 'nullable|date_format:Y-m-d H:i:s',
            'hasProblem' => 'nullable|boolean',
            'requestData' => 'nullable|string',
            'validationResult' => 'nullable|string',
            'iikoBizResponse' => 'nullable|string',
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
