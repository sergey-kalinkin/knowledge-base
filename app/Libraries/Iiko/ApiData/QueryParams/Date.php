<?php

namespace App\Libraries\Iiko\ApiData\QueryParams;


use App\Libraries\AbstractElements\AQueryParams;

/**
 * @property string $date
 */
class Date extends AQueryParams
{
    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'date' => 'required|date_format:Y-m-d',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function messages(): array
    {
        return [
            'date.required' => 'param `date_from` not given',
            'date.date_format' => 'incorrect date format for param `date_from`. Must be Y-m-d',
        ];
    }
}
