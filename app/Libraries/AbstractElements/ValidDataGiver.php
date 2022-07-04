<?php

namespace App\Libraries\AbstractElements;

trait ValidDataGiver
{
    /**
     * @var array|null
     */
    protected $valid_data;

    /**
     * Return data passed validation
     *
     * @return array|null
     */
    public function getValidData() : ?array
    {
        return $this->valid_data;
    }

    /**
     * Return all data with deeper validation
     *
     * @return array|null
     */
    public function getAllValidData() : ?array
    {
        //TODO default behaviour
        return static::getValidData();
    }
}
