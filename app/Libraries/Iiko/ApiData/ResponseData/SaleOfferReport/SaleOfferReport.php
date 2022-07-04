<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\SaleOfferReport;


use App\Libraries\AbstractElements\AData;
use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\AbstractElements\AEntity;
use App\Libraries\Iiko\ApiData\DataAdaptors\OlapDiscountDepartmentAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IOlapDiscountDepartmentContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $discountName
 */
class SaleOfferReport extends AData implements IOlapDiscountDepartmentContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'discountName' => 'required|string',
            'olapDiscountDepartmentList' => 'required|array|min:1',
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

    public function getDiscountDepartmentList(): OlapDiscountDepartmentAdaptor
    {
        return new OlapDiscountDepartmentAdaptor(
            new IikoData($this->data['olapDiscountDepartmentList'])
        );
    }
}
