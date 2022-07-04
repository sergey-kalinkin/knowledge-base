<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\IikoCard;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\IikoTransactionTypeAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IIkoTransactionTypeContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $id
 * @property string $operationDate
 * @property string $phoneNumber
 * @property string $transactionCreateDate
 * @property integer $transactionSum
 * @property string|null $comment
 * @property integer|null $balanceAfter
 * @property integer|null $balanceBefore
 * @property string|null $marketingCampaignName
 * @property string|null $programName
 * @property integer|null $posBalanceBefore
 * @property string|null $apiClientLogin
 * @property string|null $cardNumbers
 * @property string|null $certificateBlockReason
 * @property string|null $certificateCounteragent
 * @property string|null $certificateCounteragentType
 * @property string|null $certificateEmitentName
 * @property string|null $certificateNominal
 * @property string|null $certificateNumber
 * @property string|null $certificateStatus
 * @property string|null $certificateType
 * @property string|null $couponNumber
 * @property string|null $couponSeries
 * @property string|null $iikoBizUser
 * @property string $orderCreateDate
 * @property integer $orderNumber
 * @property integer $orderSum
 * @property string $guestId
 */
class IikoCardTransaction extends AData implements IIkoTransactionTypeContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return [
            'id' => 'required|string',
            'operationDate' => 'required|date_format:Y-m-d',
            'phoneNumber' => 'required|string',
            'transactionCreateDate' => 'required|date_format:Y-m-d H:i:s',
            'transactionSum' => 'required|integer',
            'comment' => 'nullable|string',
            'balanceAfter' => 'nullable|integer',
            'balanceBefore' => 'nullable|integer',
            'transactionType' => 'required|array',
            'marketingCampaignName' => 'nullable|string',
            'programName' => 'nullable|string',
            'posBalanceBefore' => 'nullable|integer',
            'apiClientLogin' => 'nullable|string',
            'cardNumbers' => 'nullable|string',
            'certificateBlockReason' => 'nullable|string',
            'certificateCounteragent' => 'nullable|string',
            'certificateCounteragentType' => 'nullable|string',
            'certificateEmitentName' => 'nullable|string',
            'certificateNominal' => 'nullable|string',
            'certificateNumber' => 'nullable|string',
            'certificateStatus' => 'nullable|string',
            'certificateType' => 'nullable|string',
            'couponNumber' => 'nullable|string',
            'couponSeries' => 'nullable|string',
            'iikoBizUser' => 'nullable|string',
            'orderCreateDate' => 'required|date_format:Y-m-d H:i:s',
            'orderNumber' => 'required|integer',
            'orderSum' => 'required|integer',
            'guestId' => 'required|string',
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

    public function getTransactionTypes(): IikoTransactionTypeAdaptor
    {
        return new IikoTransactionTypeAdaptor(
            new IikoData($this->data['transactionType'] ?? [])
        );
    }
}
