<?php

namespace App\Libraries\Iiko\ApiData\QueryParams;


use App\Libraries\AbstractElements\AQueryParams;

/**
 * @property $id
 */
class ClientIdParams extends AQueryParams
{
    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|regex:/\+\d{11}/'
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
}
