<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property string|null $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $comment
 * @property boolean $combinable
 * @property boolean $deleted
 * @property integer|null $externalRevision
 * @property string[]|null $applicableMarketingCampaigns
 */
class PaymentType extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'nullable|string',
            'code' => 'nullable|string',
            'name' => 'nullable|string',
            'comment' => 'nullable|string',
            'combinable' => 'required|boolean',
            'deleted' => 'required|boolean',
            'externalRevision' => 'nullable|integer',
            'applicableMarketingCampaigns' => 'nullable|array',
            'applicableMarketingCampaigns.*' => 'string',
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
