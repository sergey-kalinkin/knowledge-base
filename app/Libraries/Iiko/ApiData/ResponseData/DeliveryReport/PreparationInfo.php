<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;

/**
 * Class StatusInfo
 * @package App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport
 *
 * @property string|null $header
 * @property string $message
 * @property string|null $color
 */
class PreparationInfo extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'header' => 'nullable|string',
            'message' => 'required|string',
            'color' => 'nullable|string',
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
