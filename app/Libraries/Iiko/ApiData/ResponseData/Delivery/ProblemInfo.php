<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Delivery;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $problem
 * @property boolean|null $hasProblem
 */
class ProblemInfo extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'problem' => 'required|string',
            'hasProblem' => 'nullable|boolean',
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
