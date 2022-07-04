<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Nomenclature;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $terminalId
 * @property integer $price
 */
class DifferentPriceInfo extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'terminalId' => 'required|string',
            'price' => 'required|integer'
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
