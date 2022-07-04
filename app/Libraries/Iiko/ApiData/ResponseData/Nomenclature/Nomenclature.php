<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Nomenclature;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\DifferentPriceInfoAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ModifierAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\NomenclatureAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IDifferentPriceInfoContract;
use App\Libraries\Iiko\ApiData\DataContracts\INomenclatureChildContract;
use App\Libraries\Iiko\ApiData\DataContracts\IGroupModifireContract;
use App\Libraries\Iiko\ApiData\DataContracts\IModifireContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property numeric|null $carbohydrateAmount
 * @property numeric|null $carbohydrateFullAmount
 * @property boolean|null $doNotPrintInCheque
 * @property numeric|null $energyAmount
 * @property numeric|null $energyFullAmount
 * @property numeric|null $fatAmount
 * @property numeric|null $fatFullAmount
 * @property numeric|null $fiberAmount
 * @property numeric|null $fiberFullAmount
 * @property string|null $groupId
 * @property string|null $key
 * @property string $measureUnit
 * @property integer $price
 * @property string|null $productCategoryId
 * @property string[]|null $prohibitedToSaleOn
 * @property string $type
 * @property boolean|null $useBalanceForSell
 * @property numeric $weight
 * @property integer|null $warningType
 */
class Nomenclature extends ANomenclature implements IModifireContract, IGroupModifireContract, INomenclatureChildContract, IDifferentPriceInfoContract
{
    public function __get($name)
    {
        if($name === 'prohibitedToSaleOn' && !empty($this->data[$name]))
            return array_column($this->data[$name], 'terminalId');

        return parent::__get($name);
    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [

            'carbohydrateAmount' => 'nullable|numeric',
            'carbohydrateFullAmount' => 'nullable|numeric',
            'differentPricesOn' => 'nullable|array',
            'doNotPrintInCheque' => 'nullable|boolean',
            'energyAmount' => 'nullable|numeric',
            'energyFullAmount' => 'nullable|numeric',
            'fatAmount' => 'nullable|numeric',
            'fatFullAmount' => 'nullable|numeric',
            'fiberAmount' => 'nullable|numeric',
            'fiberFullAmount' => 'nullable|numeric',
            'groupId' => 'nullable|string',
            'key' => 'nullable|string',
            'groupModifiers' => 'nullable|array',
            'measureUnit' => 'required|string',
            'modifiers' => 'nullable|array',
            'price' => 'required|integer',
            'productCategoryId' => 'nullable|string',
            'prohibitedToSaleOn' => 'nullable|array',
            'children' => 'nullable|array',
            'prohibitedToSaleOn.*.terminalId' => 'string',
            'type' => 'required|string',
            'useBalanceForSell' => 'nullable|boolean',
            'weight' => 'required|numeric',
            'warningType' => 'nullable|integer',
        ]);
    }

    public function getGroupModifiers(): ModifierAdaptor
    {
        return new ModifierAdaptor(
            new IikoData($this->data['groupModifiers'] ?? [])
        );
    }

    public function getModifiers(): ModifierAdaptor
    {
        return new ModifierAdaptor(
            new IikoData($this->data['modifiers'] ?? [])
        );
    }

    public function getChildren(): NomenclatureAdaptor
    {
        return new NomenclatureAdaptor(
            new IikoData($this->data['children'] ?? [])
        );
    }

    public function getDifferentPriceInfo(): DifferentPriceInfoAdaptor
    {
        return new DifferentPriceInfoAdaptor(
            new IikoData($this->data['differentPricesOn'] ?? [])
        );
    }
}
