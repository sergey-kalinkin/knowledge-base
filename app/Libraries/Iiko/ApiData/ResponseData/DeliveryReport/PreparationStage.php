<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;

/**
 * Class PreparationPointStatistic
 * @package App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport
 *
 * @property int $stage
 * @property string $place
 * @property int $delay
 * @property int $time
 * @property string $responsible
 * @property string $responsibleId
 */
class PreparationStage extends AData
{
    public function __get($name)
    {
        if($name === 'stage')
            return $this->data['type']['order'];

        if($name === 'place')
            return $this->data['type']['name'];

        return parent::__get($name);
    }

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'type' => 'required|array',
            'type.order' => 'required|integer',
            'type.name' => 'required|string',
            'delay' => 'required|integer',
            'time' => 'required|integer',
            'responsible' => 'required|string',
            'responsibleId' => 'required|string',
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
        $order_request = parent::getAllValidData();

        $type = [
            'stage' => $order_request['type']['order'],
            'place' => $order_request['type']['name'],
        ];
        unset($order_request['type']);

        return array_merge(
            $order_request,
            $type
        );
    }
}
