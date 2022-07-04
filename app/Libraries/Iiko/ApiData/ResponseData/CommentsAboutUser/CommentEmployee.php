<?php

namespace App\Libraries\Iiko\ApiData\ResponseData\CommentsAboutUser;


use App\Libraries\AbstractElements\AData;
use App\Libraries\Iiko\ApiData\DataAdaptors\EmployeeDescriptionAdaptor;
use App\Libraries\Iiko\ApiData\DataContracts\IEmployeeDescriptionContract;
use App\Libraries\Iiko\ApiData\IikoData;

/**
 * @property string $id
 * @property string $createTime
 */
class CommentEmployee extends BaseCommentClient implements IEmployeeDescriptionContract
{

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return array_merge(parent::rules(), [
            'id' => 'required|string',
            'user' => 'nullable|array',
            'createTime' => 'required|date_format:Y-m-d H:i:s',
        ]);
    }

    public function getEmployeeDescriptions(): EmployeeDescriptionAdaptor
    {
        return new EmployeeDescriptionAdaptor(
            new IikoData($this->data['user'] ?? [])
        );
    }
}
