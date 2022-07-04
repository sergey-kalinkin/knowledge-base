<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;

/**
 * Class StatusInfo
 * @package App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport
 *
 * @property string $shortName
 * @property string $id
 * @property string $displayName
 */
class ResponsiblePerson extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'shortName' => 'required|string',
            'id' => 'required|string',
            'displayName' => 'required|string',
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
