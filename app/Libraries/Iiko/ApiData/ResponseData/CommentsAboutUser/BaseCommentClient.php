<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\CommentsAboutUser;


use App\Libraries\AbstractElements\AData;

/**
 * @property string $guestId
 * @property string $userId - employee id
 * @property string $comment
 */
class BaseCommentClient extends AData
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'guestId' => 'required|regex:/\+\d{11}/',
            'userId' => 'required|regex:/[a-f\d]{8}-([a-f\d]{4}-){3}[a-f\d]{12}/',
            'comment' => 'required|string',
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
