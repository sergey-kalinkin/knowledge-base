<?php

namespace App\Libraries\Iiko\ApiData\QueryParams;


/**
 * @property string $with_processing
 */
class SaleOfferReportParams extends DateRange
{
    public function __get($name)
    {
        if($name === 'with_processing')
            return ['false', 'true'][($this->data[$name] ?? 0)];

        return parent::__get($name);
    }

    /**
     * @inheritDoc
     */
    protected function rules(): array
    {
        return array_merge(parent::rules(), [
            'with_processing' => 'boolean'
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function messages(): array
    {
        return array_merge(parent::messages(), [
            'with_processing.boolean' => 'incorrect type for param `with_processing`. Must be boolean'
        ]);
    }
}
