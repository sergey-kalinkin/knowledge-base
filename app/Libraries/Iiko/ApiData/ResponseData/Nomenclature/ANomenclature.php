<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Nomenclature;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\ImageAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IImageContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string|null $additionalInfo
 * @property string|null $code
 * @property string|null $description
 * @property string $id
 * @property boolean $isDeleted
 * @property string $name
 * @property string|null $seoDescription
 * @property string|null $seoText
 * @property string|null $seoTitle
 * @property string|null $parentGroup
 * @property string|null $seoKeywords
 * @property boolean $isIncludedInMenu
 * @property integer|null $order
 * @property string[]|null $tags
 */
abstract class ANomenclature extends AData implements IImageContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'additionalInfo' => 'nullable|string',
            'code' => 'nullable|string',
            'description' => 'nullable|string',
            'id' => 'required|string',
            'isDeleted' => 'required|boolean',
            'name' => 'required|string',
            'seoDescription' => 'nullable|string',
            'seoKeywords' => 'nullable|string',
            'seoText' => 'nullable|string',
            'seoTitle' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
            'images' => 'nullable|array',
            'isIncludedInMenu' => 'required|boolean',
            'order' => 'nullable|integer',
            'parentGroup' => 'nullable|string'
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

    public function getImages(): ImageAdaptor
    {
        return new ImageAdaptor(
            new IikoData($this->data['images'] ?? [])
        );
    }
}
