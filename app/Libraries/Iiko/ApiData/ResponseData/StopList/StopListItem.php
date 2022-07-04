<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\StopList;


use App\Libraries\AbstractElements\AData;

/**
 * @property integer $balance
 * @property string $productId
 */
class StopListItem extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'balance' => 'required|integer',
            'productId' => 'required|string'
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
