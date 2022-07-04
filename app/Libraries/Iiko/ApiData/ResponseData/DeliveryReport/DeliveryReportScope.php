<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $date_from
 * @property string $date_to
 * @property null|string[] $restaurantIdList
 * @property null|string $type
 * @property null|boolean $consolidated - true это сводный false это по дням
 */
class DeliveryReportScope extends AData
{
    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'dateFrom' => 'required|date_format:Y-m-d',
            'dateTo' => 'required|date_format:Y-m-d|after_or_equal:dateFrom',
            'restaurantIdList' => 'array|min:1',
            'restaurantIdList.*' => 'required|string',
            'type' => 'string',
            'consolidated' => 'boolean',
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

    /**
     * @inheritdoc
     */
    public function getAllValidData() : ?array
    {
        return array_merge([
            'restaurantIdList' => ['vlz', 'vlg_vorosh', 'vlg_dzerzh', 'vlg_krasnoarm', 'vlg_met', 'vlg_svt', 'samara'], //all
            'type' => 'RESTAURANTS', // - для снятия отчета по ресторану, for a courier use COURIERS
            'consolidated' => false // - true это сводный false это по дням.
        ], static::getValidData());
    }
}
