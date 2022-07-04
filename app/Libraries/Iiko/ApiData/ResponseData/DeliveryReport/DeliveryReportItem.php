<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\PreparationSnapshotAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\PreparationStageAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IPreparationSnapshotContract;
use App\Libraries\Iiko\ApiData\DataContracts\IPreparationStageContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * Class DeliveryReportItem
 * @package App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport
 *
 * @property string $id
 * @property int $orderNumber
 * @property int $version
 * @property int $lifetime
 * @property int $totalDelay
 * @property int $totalTime
 * @property string|null $violationCause
 * @property string $deliveryMode
 * @property boolean $isStrangeFast
 */
class DeliveryReportItem extends AData implements IPreparationStageContract, IPreparationSnapshotContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'orderNumber' => 'required|integer',
            'version' => 'required|integer',
            'lifetime' => 'required|integer',
            'totalDelay' => 'required|integer',
            'totalTime' => 'required|integer',
            'violationCause' => 'nullable|string',
            'deliveryMode' => 'required|string',
            'lifetimeParts' => 'required|array',
            'timeline' => 'required|array',
            'isStrangeFast' => 'required|boolean',
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
        $report_item = parent::getAllValidData();

        $snapshots = static::retrieveAllValidData(
            static::getSnapshot()
        );

        $stages = static::retrieveAllValidData(
            static::getStage()
        );

        return array_merge(
            $report_item,
            ['lifetimeParts' => $snapshots],
            ['timeline' => $stages]
        );
    }

    public function getSnapshot(): PreparationSnapshotAdaptor
    {
        return new PreparationSnapshotAdaptor(
            new IikoData($this->data['timeline'] ?? [])
        );
    }

    public function getStage(): PreparationStageAdaptor
    {
        return new PreparationStageAdaptor(
            new IikoData($this->data['lifetimeParts'] ?? [])
        );
    }
}
