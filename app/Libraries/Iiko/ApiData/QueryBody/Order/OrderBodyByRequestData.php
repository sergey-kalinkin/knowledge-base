<?php

namespace App\Libraries\Iiko\ApiData\QueryBody\Order;


use App\Libraries\AbstractElements\IQueryBody;
use App\Services\Iiko\Order\OrderBuilders\OrderRequestBuilder;
use Illuminate\Validation\ValidationException;

class OrderBodyByRequestData implements IQueryBody
{
    /**
     * @var OrderRequestBuilder
     */
    private $builder;

    public function __construct(array $order_data)
    {
        $this->builder = new OrderRequestBuilder($order_data);
    }

    /**
     * @throws ValidationException
     */
    public function getBody(): array
    {
        return $this->builder->build();
    }
}
