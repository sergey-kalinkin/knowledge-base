<?php

namespace App\Libraries\AbstractElements;

interface IElementMaker
{
    /**
     *
     * @return AElement|null
     */
    public function createOne();
}
