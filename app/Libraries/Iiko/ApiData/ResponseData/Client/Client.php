<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\Client;


use App\Libraries\Iiko\ApiData\ResponseData\Profile;

/**
 * @property string|null $iikoBizId
 * @property string|null $cityId
 * @property string|null $iikoBizName
 * @property string|null $iikoBizSurname
 * @property string|null $iikoBizMiddlename
 * @property string|null $iikoBizBirthdate
 * @property string|null $iikoBizEmail
 * @property string|null $iikoBizSex
 * @property integer $orderCount
 * @property numeric $totalSum
 * @property numeric $avgCheque
 * @property string|null $lastOrderTime
 * @property string|null $updateTime
 * @property integer $hashcode
 * @property string|null $comment
 */
class Client extends Profile
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return array_merge(parent::rules(), [
            'cityId' => 'nullable|string',
            'iikoBizId' => 'nullable|string',
            'iikoBizName' => 'nullable|string',
            'iikoBizSurname' => 'nullable|string',
            'iikoBizMiddlename' => 'nullable|string',
            'iikoBizBirthdate' => 'nullable|date_format:Y-m-d',
            'iikoBizEmail' => 'nullable|string',
            'iikoBizSex' => 'nullable|string',
            'orderCount' => 'required|integer',
            'totalSum' => 'required|numeric',
            'avgCheque' => 'required|numeric',
            'lastOrderTime' => 'nullable|date_format:Y-m-d H:i:s',
            'updateTime' => 'nullable|date_format:Y-m-d H:i:s',
            'hashcode' => 'required|integer',
            'comment' => 'nullable|string',
        ]);
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
