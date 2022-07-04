<?php

namespace App\Libraries\Iiko\ApiData\QueryParams;


use App\Libraries\AbstractElements\AQueryParams;

/**
 * @property string $classifier_id
 */
class StreetClassifierIdParams extends AQueryParams
{
    protected function rules(): array
    {
        return [
            'classifier_id' => 'required|regex:/\d{17}/'
        ];
    }

    protected function messages(): array
    {
        return [
            'classifier_id.regex' => 'classifier_id didn`t match with the regex pattern of classifier_id (street kladr)'
        ];
    }
}
