<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


/**
 * @property string $headerName
 * @property string $dateFrom
 * @property string $dateTo
 * @property int $totalDeliveryCount
 * @property int $totalDelayCount
 * @property int $callCenterDelayCount
 * @property int $kitchenDelayCount
 * @property int $courierDelayCount
 * @property float $averageDeliveryTimeMinutes
 * @property float $averageKitchenTimeMinutes
 * @property float $averageTravelTimeMinutes
 * @property int $strangeFastOrderCount
 * @property float $totalDelayPercent
 * @property float $callCenterDelayPercent
 * @property float $kitchenDelayPercent
 * @property float $courierDelayPercent
 * @property float $strangeFastOrderPercent
 */
class DeliveryReportHeader extends \App\Libraries\AbstractElements\AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'headerName' => 'required|string',
            'dateFrom' => 'required|string',
            'dateTo' => 'required|string',
            'totalDeliveryCount' => 'required|integer',
            'totalDelayCount' => 'required|integer',
            'callCenterDelayCount' => 'required|integer',
            'kitchenDelayCount' => 'required|integer',
            'courierDelayCount' => 'required|integer',
            'averageDeliveryTimeMinutes' => 'required|numeric',
            'averageKitchenTimeMinutes' => 'required|numeric',
            'averageTravelTimeMinutes' => 'required|numeric',
            'strangeFastOrderCount' => 'required|integer',
            'totalDelayPercent' => 'required|numeric',
            'callCenterDelayPercent' => 'required|numeric',
            'kitchenDelayPercent' => 'required|numeric',
            'courierDelayPercent' => 'required|numeric',
            'strangeFastOrderPercent' => 'required|numeric',
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
