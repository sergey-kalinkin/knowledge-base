<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


/**
 * @property string $id
 * @property string|null $name
 */
class DeliveryCancelCause extends \App\Libraries\AbstractElements\AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'name' => 'nullable|string',
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
}
