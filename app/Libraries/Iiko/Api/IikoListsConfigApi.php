<?php

namespace App\Libraries\Iiko\Api;


class IikoListsConfigApi extends ABaseApiConfig
{
    /**
     * @inheritDoc
     */
    protected function clientOptions(): array
    {
        return [
            'base_uri' => config('iiko_api.lists_api')
        ];
    }
}
