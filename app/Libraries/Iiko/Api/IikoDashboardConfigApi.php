<?php


namespace App\Libraries\Iiko\Api;


class IikoDashboardConfigApi extends ABaseApiConfig
{
    /**
     * @inheritDoc
     */
    protected function clientOptions(): array
    {
        return [
            'base_uri' => config('iiko_api.dashboard_api')
        ];
    }
}
