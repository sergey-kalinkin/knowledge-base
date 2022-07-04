<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\DeliveryTerminal;


use App\Libraries\AbstractElements\AData;

/**
 * @property integer $dayOfWeek
 * @property string|null $from
 * @property string|null $to
 * @property boolean $allDay
 * @property boolean $closed
 */
class TerminalWorkingHours extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'dayOfWeek' => 'required|integer',
            'from' => 'nullable|string',
            'to' => 'nullable|string',
            'allDay' => 'required|boolean',
            'closed' => 'required|boolean',
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
}
