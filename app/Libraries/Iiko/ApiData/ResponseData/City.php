<?php

namespace App\Libraries\Iiko\ApiData\ResponseData;


use App\Libraries\AbstractElements\AData;

/**
 * Description of a city stored by iiko
 *
 * @property string $id
 * @property string $classifierId
 * @property string $name
 * @property boolean $deleted
 * @property integer|null $externalRevision
 * @property string|null $additionalInfo
 */
class City extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'classifierId' => 'required|string',
            'name' => 'required|string',
            'deleted' => 'required|boolean',
            'externalRevision' => 'nullable|integer',
            'additionalInfo' => 'nullable|string',
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
