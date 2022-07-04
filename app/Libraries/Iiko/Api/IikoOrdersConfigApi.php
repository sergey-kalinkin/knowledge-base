<?php

namespace App\Libraries\Iiko\Api;


class IikoOrdersConfigApi extends ABaseApiConfig
{
    /**
     * @inheritDoc
     */
    protected function clientOptions(): array
    {
        return [
            'base_uri' => config('iiko_api.order_api')
        ];
    }
}
