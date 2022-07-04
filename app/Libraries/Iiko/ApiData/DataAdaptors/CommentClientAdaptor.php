<?php

namespace App\Libraries\Iiko\ApiData\DataAdaptors;


use App\Libraries\AbstractElements\ADataAdaptor;
use App\Libraries\Iiko\ApiData\ResponseData\CommentsAboutUser\CommentEmployee;

final class CommentClientAdaptor extends ADataAdaptor
{

    public function createOne(): ?CommentEmployee
    {
        try {
            return new CommentEmployee($this->getItem());
        }
        catch (\Throwable $t) {
            if($this->isProcessing())
                return $this->createOne();

            $this->reset();
            return null;
        }
    }
}
