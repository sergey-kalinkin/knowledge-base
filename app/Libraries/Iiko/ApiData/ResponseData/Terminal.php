<?php

namespace App\Libraries\Iiko\ApiData\ResponseData;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property string $name
 * @property boolean $isActive
 */
class Terminal extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'name' => 'required|string',
            'isActive' => 'required|boolean',
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
