<?php

namespace App\Libraries\Iiko\ApiData\QueryBody\ClientComment;


use App\Libraries\AbstractElements\IQueryBody;
use App\Libraries\Iiko\ApiData\QueryParams\ClientIdParams;

class ClientIdBodyCommentParams extends ClientIdParams implements IQueryBody
{
    public function getBody(): array
    {
        //TODO build body by client id
        return [];
    }
}
