<?php

namespace App\Libraries\Iiko\ApiData\QueryParams;


use App\Libraries\AbstractElements\AQueryParams;

/**
 * @property string $date_from
 * @property string $date_to
 */
class DateRange extends AQueryParams
{
    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'date_from' => 'required|date_format:Y-m-d',
            'date_to' => 'required|date_format:Y-m-d|after_or_equal:date_from',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function messages(): array
    {
        return [
            'date_from.required' => 'param `date_from` not given',
            'date_from.date_format' => 'incorrect date format for param `date_from`. Must be Y-m-d',
            'date_to.required' => 'param `date_to` not given',
            'date_to.date_format' => 'incorrect date format for param `date_to`. Must be Y-m-d',
            'date_to.after_or_equal' => '`date_to` greater than `date_from`',
        ];
    }
}
