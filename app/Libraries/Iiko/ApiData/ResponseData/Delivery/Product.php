<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\ComboInfoAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\ProductAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IComboInfoContract;
use App\Libraries\Iiko\ApiData\DataContracts\IDeliveryProductContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $id
 * @property string|null $orderItemId
 * @property string|null $code
 * @property string|null $name
 * @property string|null $category
 * @property integer $amount
 * @property string|null $size
 * @property integer|null $sum
 * @property string|null $guestId
 * @property string|null $comment
 * @property string|null $groupId
 * @property string|null $groupName
 */
class Product extends AData implements IDeliveryProductContract, IComboInfoContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'orderItemId' => 'nullable|string',
            'code' => 'nullable|string',
            'name' => 'nullable|string',
            'category' => 'nullable|string',
            'amount' => 'required|integer',
            'size' => 'nullable|string',
            'sum' => 'nullable|integer',
            'guestId' => 'nullable|string',
            'comboInformation' => 'nullable|array',
            'comment' => 'nullable|string',
            'groupId' => 'nullable|string',
            'groupName' => 'nullable|string',
            'modifiers' => 'nullable|array'
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
        $order = parent::getAllValidData();

        //
        $modifiers = static::retrieveAllValidData(
            static::getModifiers()
        );

        //
        $combo_info = static::retrieveAllValidData(
            static::getComboInfo()
        );

        return array_merge(
            $order,
            ['modifiers' => $modifiers ?? null],
            ['comboInformation' => $combo_info[0]  ?? null]
        );
    }

    public function getModifiers(): ProductAdaptor
    {
        return new ProductAdaptor(
            new IikoData($this->data['modifiers'] ?? [])
        );
    }

    public function getComboInfo(): ComboInfoAdaptor
    {
        return new ComboInfoAdaptor(
            new IikoData($this->data['comboInformation'] ?? [])
        );
    }
}
