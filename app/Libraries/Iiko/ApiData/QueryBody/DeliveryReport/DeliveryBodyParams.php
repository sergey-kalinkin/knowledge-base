<?php


namespace App\Libraries\Iiko\ApiData\QueryBody\DeliveryReport;


use App\Libraries\AbstractElements\IQueryBody;
use App\Libraries\Iiko\ApiData\ResponseData\DeliveryReport\DeliveryReportScope;

class DeliveryBodyParams implements IQueryBody
{
    /**
     * @var DeliveryReportScope
     */
    private $params;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __construct(array $delivery_body_data)
    {
        $this->params = new DeliveryReportScope($delivery_body_data);
    }

    public function getBody(): array
    {
        return $this->params->getAllValidData();
    }
}
