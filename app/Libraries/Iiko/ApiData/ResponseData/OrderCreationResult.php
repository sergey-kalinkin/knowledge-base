<?php

namespace App\Libraries\Iiko\ApiData\ResponseData;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $requestId
 * @property string|null $orderId
 * @property string|null $message
 * @property string $validationStatus
 * @property string $iikoBizStatus
 * @property boolean|null $hasProblem
 */
class OrderCreationResult extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'requestId' => 'required|string',
            'orderId' => 'nullable|string',
            'message' => 'nullable|string',
            'validationStatus' => 'required|string',
            'iikoBizStatus' => 'required|string',
            'hasProblem' => 'nullable|boolean',
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
