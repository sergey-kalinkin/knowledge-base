<?php

namespace App\Libraries\Iiko\ApiData\QueryBody\ClientProfile;


use App\Libraries\AbstractElements\IQueryBody;
use App\Libraries\Iiko\ApiData\QueryParams\ClientIdParams;

class ClientIdBodyProfileParams extends ClientIdParams implements IQueryBody
{
    public function getBody(): array
    {
        //TODO build body by client id
        return [];
    }
}
