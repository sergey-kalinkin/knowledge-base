<?php

namespace App\Libraries\AbstractElements;


use Illuminate\Validation\ValidationException;

abstract class AData extends AElement
{
    use AdaptorRetriever;

    /**
     * init data model
     * @param array $data
     * @throws ValidationException
     */
    public function __construct(array $data)
    {
        $this->valid_data = static::validate($data);
        $this->data = $data;
    }
}
