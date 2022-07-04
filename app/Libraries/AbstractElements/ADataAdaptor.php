<?php

namespace App\Libraries\AbstractElements;


use Generator;

abstract class ADataAdaptor implements IElementMaker
{
    /**
     * @var Generator
     */
    protected $iterator;

    /**
     * @var AComposite
     */
    protected $data;

    public function __construct(AComposite $data)
    {
        $this->data = $data;
        $this->iterator = $data->getYet();
    }

    /**
     *
     * @return mixed|null
     */
    protected function getItem()
    {
        if($this->iterator->valid()) {
            $item = $this->iterator->current();
            $this->iterator->next();
            return $item;
        }

        return null;
    }

    protected function isProcessing(): bool
    {
        return $this->iterator->valid();
    }

    protected function reset()
    {
        $this->iterator = $this->data->getYet();
    }
}
