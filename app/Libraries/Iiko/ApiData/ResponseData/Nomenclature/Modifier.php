<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Nomenclature;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\ModifierAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IChildModifierContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property integer $maxAmount
 * @property integer $minAmount
 * @property string $modifierId
 * @property boolean $required
 * @property integer|null $defaultAmount
 * @property boolean|null $hideIfDefaultAmount
 * @property boolean|null $childModifiersHaveMinMaxRestrictions
 */
class Modifier extends AData implements IChildModifierContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'maxAmount' => 'required|integer',
            'minAmount' => 'required|integer',
            'modifierId' => 'required|string',
            'required' => 'required|boolean',
            'defaultAmount' => 'nullable|integer',
            'hideIfDefaultAmount' => 'nullable|boolean',
            'childModifiersHaveMinMaxRestrictions' => 'nullable|boolean',
            'childModifiers' => 'nullable|array',
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

    public function getChildModifiers(): ModifierAdaptor
    {
        return new ModifierAdaptor(
            new IikoData($this->data['childModifiers'] ?? [])
        );
    }
}
