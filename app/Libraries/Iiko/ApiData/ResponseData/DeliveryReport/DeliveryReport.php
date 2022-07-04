<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\CourierDelayedStatAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryReportHeaderAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DeliveryReportItemAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\ICourierDelayedStatContract;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryReportHeaderContract;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryReportCategoriesContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property int|null $totalCourierCount
 * @property string $headerName
 * @property string $headerString
 */
class DeliveryReport extends AData implements IDeliveryReportHeaderContract,
    IDeliveryReportCategoriesContract, ICourierDelayedStatContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'header' => 'required|array',
            'delayedDeliveries' => 'nullable|array',
            'inTimeDeliveries' => 'nullable|array',
            'strangeFastDeliveries' => 'nullable|array',
            'totalCourierCount' => 'nullable|integer',
            'delayedCouriers' => 'nullable|array',
            'headerName' => 'required|string',
            'headerString' => 'required|string',
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

    public function getAllValidData(): ?array
    {
        //
        $report = parent::getAllValidData();

        $header = static::retrieveAllValidData(
            static::getHeader()
        );

        $delayed_deliveries = static::retrieveAllValidData(
            static::getDelayedDeliveries()
        );

        $in_time_deliveries = static::retrieveAllValidData(
            static::getInTimeDeliveries()
        );

        $strange_fast_deliveries = static::retrieveAllValidData(
            static::getStrangeFastDeliveries()
        );

        $courier_status = static::retrieveAllValidData(
            static::getCourierStatus()
        );

        return array_merge(
            $report,
            ['header' => $header],
            ['delayedDeliveries' => $delayed_deliveries],
            ['inTimeDeliveries' => $in_time_deliveries],
            ['strangeFastDeliveries' => $strange_fast_deliveries],
            ['delayedCouriers' => $courier_status]
        );
    }

    public function getHeader(): DeliveryReportHeaderAdaptor
    {
        return new DeliveryReportHeaderAdaptor(
            new IikoData($this->data['header'] ?? [])
        );
    }

    public function getDelayedDeliveries(): DeliveryReportItemAdaptor
    {
        return new DeliveryReportItemAdaptor(
            new IikoData($this->data['delayedDeliveries'] ?? [])
        );
    }

    public function getInTimeDeliveries(): DeliveryReportItemAdaptor
    {
        return new DeliveryReportItemAdaptor(
            new IikoData($this->data['inTimeDeliveries'] ?? [])
        );
    }

    public function getStrangeFastDeliveries(): DeliveryReportItemAdaptor
    {
        return new DeliveryReportItemAdaptor(
            new IikoData($this->data['strangeFastDeliveries'] ?? [])
        );
    }

    public function getCourierStatus(): CourierDelayedStatAdaptor
    {
        return new CourierDelayedStatAdaptor(
            new IikoData($this->data['delayedCouriers'] ?? [])
        );
    }
}
