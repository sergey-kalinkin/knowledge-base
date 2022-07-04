<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $comboId
 * @property string|null $comboSourceId
 * @property string|null $groupId
 */
class ComboInformation extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'comboId' => 'required|string',
            'comboSourceId' => 'nullable|string',
            'groupId' => 'nullable|string',
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
