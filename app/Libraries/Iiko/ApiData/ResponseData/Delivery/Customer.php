<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\CustomerCardAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\ICustomerCardContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string|null $id
 * @property string|null $externalId
 * @property string $name
 * @property string|null $surName
 * @property string|null $middleName
 * @property string|null $nick
 * @property string|null $comment
 * @property string|null $email
 * @property string $phone
 * @property integer|null $sex
 * @property string|null $birthday
 * @property integer|null $balance
 * @property string|null $cultureName
 * @property string|null $favouriteDish
 * @property string|null $imageId
 * @property boolean|null $isBlocked
 * @property boolean|null $shouldReceivePromoActionsInfo
 * @property string[]|null $additionalPhones
 */
class Customer extends AData implements ICustomerCardContract
{
    public function __get($name)
    {
        if($name === 'additionalPhones')
            return array_column($this->data[$name], 'phone');

        return parent::__get($name);
    }

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'nullable|string',
            'externalId' => 'nullable|string',
            'name' => 'required|string',
            'surName' => 'nullable|string',
            'middleName' => 'nullable|string',
            'nick' => 'nullable|string',
            'comment' => 'nullable|string',
            'phone' => 'required|string',
            'email' => 'nullable|string',
            'sex' => 'nullable|integer',
            'birthday' => 'nullable|date_format:d.m.Y',
            'balance' => 'nullable|string',
            'cultureName' => 'nullable|string',
            'favouriteDish' => 'nullable|string',
            'imageId' => 'nullable|string',
            'isBlocked' => 'nullable|boolean',
            'shouldReceivePromoActionsInfo' => 'nullable|boolean',
            'additionalPhones' => 'nullable|array',
            'additionalPhones.phone' => 'string',
            'cards' => 'nullable|array',
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

        //
        $cards = static::retrieveAllValidData(
            static::getCards()
        );

        return array_merge(
            $order_request,
            ['cards' => $cards ?? null]
        );
    }

    public function getCards(): CustomerCardAdaptor
    {
        return new CustomerCardAdaptor(
            new IikoData($this->data['cards'] ?? [])
        );
    }
}
