<?php

namespace App\Libraries\AbstractElements;

trait AdaptorRetriever
{
    /**
     * @param ADataAdaptor $adaptor
     * @return array
     */
    protected function retrieveAllValidData(ADataAdaptor $adaptor): array
    {
        $stuff = [];
        while ($it = $adaptor->createOne()) {
            $stuff[] = $it->getAllValidData();
        }

        return $stuff;
    }
}
