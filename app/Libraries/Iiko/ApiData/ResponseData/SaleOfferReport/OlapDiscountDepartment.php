<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\SaleOfferReport;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $departmentName
 * @property integer $numberOrders
 * @property numeric $withoutDiscountSum
 * @property numeric $withDiscountSum
 * @property numeric $discountSum
 */
class OlapDiscountDepartment extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'departmentName' => 'required|string',
            'numberOrders' => 'required|integer',
            'withoutDiscountSum' => 'required|numeric',
            'withDiscountSum' => 'required|numeric',
            'discountSum' => 'required|numeric',
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
}
