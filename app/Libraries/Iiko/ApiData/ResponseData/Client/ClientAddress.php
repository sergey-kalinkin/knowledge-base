<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Client;

use App\Libraries\Iiko\ApiData\ResponseData\Delivery\Address;

/**
 * @property string $guestId
 * @property string|null $name
 * @property string|null $addressString
 */
class ClientAddress extends Address
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'guestId' => 'required|string',
            'name' => 'nullable|string',
            'addressString' => 'nullable|string',
        ]) ;
    }
}
