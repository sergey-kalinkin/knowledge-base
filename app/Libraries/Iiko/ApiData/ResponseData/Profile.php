<?php

namespace App\Libraries\Iiko\ApiData\ResponseData;

use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\ClientAddressAdaptor;
use App\Libraries\Iiko\ApiData\DataAdaptors\IikoCardCategoryAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IClientAddressContract;
use App\Libraries\Iiko\ApiData\DataContracts\IIikoCardCategoryContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $id
 * @property string $cityId
 * @property integer $walletBalance
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $middlename
 * @property string|null $birthdate
 * @property string|null $email
 * @property string|null $sex
 * @property boolean $shouldReceiveLoyaltyInfo
 * @property boolean $shouldReceiveOrderStatusInfo
 * @property boolean $shouldReceivePromoActionsInfo
 * @property boolean $avatar
 */
class Profile extends AData implements IIikoCardCategoryContract, IClientAddressContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'cityId' => 'required|string',
            'walletBalance' => 'required|integer',
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'middlename' => 'nullable|string',
            'birthdate' => 'nullable|date_format:Y-m-d',
            'email' => 'nullable|string',
            'sex' => 'nullable|string',
            'shouldReceiveLoyaltyInfo' => 'required|boolean',
            'shouldReceiveOrderStatusInfo' => 'required|boolean',
            'shouldReceivePromoActionsInfo' => 'required|boolean',
            'avatar' => 'nullable|url',
            'iikoCardCategories' => 'nullable|array',
            'favouriteAddresses' => 'nullable|array',
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

    public function getIikoCardCategories(): IikoCardCategoryAdaptor
    {
        return new IikoCardCategoryAdaptor(
            new IikoData($this->data['iikoCardCategories'] ?? [])
        );
    }

    public function getAddresses(): ClientAddressAdaptor
    {
        return new ClientAddressAdaptor(
            new IikoData($this->data['favouriteAddresses'] ?? [])
        );
    }
}
