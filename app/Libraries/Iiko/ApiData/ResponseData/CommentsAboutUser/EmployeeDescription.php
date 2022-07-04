<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\CommentsAboutUser;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $id
 * @property string $displayName
 */
class EmployeeDescription extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'displayName' => 'required|string',
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
