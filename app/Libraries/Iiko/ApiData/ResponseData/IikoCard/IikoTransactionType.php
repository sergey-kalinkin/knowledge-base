<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\IikoCard;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $nameEn
 * @property string $nameRu
 */
class IikoTransactionType extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'nameEn' => 'required|string',
            'nameRu' => 'required|string',
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
