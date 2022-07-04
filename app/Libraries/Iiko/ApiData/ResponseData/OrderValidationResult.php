<?php

namespace App\Libraries\Iiko\ApiData\ResponseData;


use App\Libraries\AbstractElements\AData;

/**
 * @property bool $success
 * @property string|null $message
 */
class OrderValidationResult extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'success' => 'required|boolean',
            'message' => 'nullable|string',
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
