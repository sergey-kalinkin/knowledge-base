<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Nomenclature;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $imageId
 * @property string $imageUrl
 * @property string $uploadDate
 */
class Image extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'imageId' => 'required|string',
            'imageUrl' => 'required|url',
            'uploadDate' => 'required|date_format:Y-m-d H:i:s',
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
