<?php

namespace App\Libraries\Iiko\ApiData\ResponseData;


use App\Libraries\AbstractElements\AData;

/**
 * Description of a street stored by iiko
 *
 * @property string $id
 * @property string $cityId
 * @property string|null $classifierId
 * @property string $name
 * @property boolean $deleted
 * @property integer|null $externalRevision
 */
class Street extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'classifierId' => 'nullable|string',
            'name' => 'required|string',
            'deleted' => 'required|boolean',
            'externalRevision' => 'nullable|integer',
            'cityId' => 'required|string',
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
