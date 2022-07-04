<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryHeader;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $nameRu
 * @property string $nameEn
 * @property string $description
 */
class DeliveryStatus extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'nameRu' => 'required|string',
            'nameEn' => 'required|string',
            'description' => 'required|string',
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
