<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;

/**
 * Class CourierDelayedStat
 * @package App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport
 *
 * @property string $name
 * @property int $value
 */
class CourierDelayedStat extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'value' => 'required|integer',
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
