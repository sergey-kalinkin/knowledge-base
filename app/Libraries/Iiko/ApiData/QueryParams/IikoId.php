<?php

namespace App\Libraries\Iiko\ApiData\QueryParams;


use App\Libraries\AbstractElements\AQueryParams;

/**
 * @property $id
 */
class IikoId extends AQueryParams
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|regex:/[a-f\d]{8}-([a-f\d]{4}-){3}[a-f\d]{12}/'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function messages(): array
    {
        return [
            'id.regex' => 'iiko id didn`t match with the regex pattern of iiko id'
        ];
    }
}
