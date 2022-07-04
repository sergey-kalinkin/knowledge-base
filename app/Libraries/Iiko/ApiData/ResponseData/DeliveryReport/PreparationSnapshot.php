<?php


namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\PreparationInfoAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ResponsiblePersonAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IPreparationInfoContract;
use App\Libraries\Iiko\ApiData\DataContracts\IResponsiblePersonContract;
use App\Libraries\Iiko\ApiData\IikoData;

class PreparationSnapshot extends AData implements IResponsiblePersonContract, IPreparationInfoContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'time' => 'required|string',
            'responsible' => 'nullable|array',
            'additionalInfo' => 'nullable|array',
            'action' => 'required|string',
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
        $preparation = parent::getAllValidData();

        $info = static::retrieveAllValidData(
            static::getInfo()
        );

        $responsible = static::retrieveAllValidData(
            static::getResponsible()
        );

        return array_merge(
            $preparation,
            ['additionalInfo' => $info],
            ['responsible' => $responsible]
        );
    }


    public function getInfo(): PreparationInfoAdaptor
    {
        return new PreparationInfoAdaptor(
            new IikoData($this->data['additionalInfo'] ?? [])
        );
    }

    public function getResponsible(): ResponsiblePersonAdaptor
    {
        return new ResponsiblePersonAdaptor(
            new IikoData($this->data['responsible'] ?? [])
        );
    }
}
