<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;

use App\Libraries\AbstractElements\AData;

/**
 * @property string $courierId
 */
class Courier extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'courierId' => 'required|string'
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
