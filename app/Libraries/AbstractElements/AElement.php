<?php

namespace App\Libraries\AbstractElements;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class AElement extends AAggregator
{
    use ValidDataGiver;

    /**
     * get data element in OOP style
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * Validate raw data
     * @throws ValidationException
     */
    protected function validate(array $data_item): array
    {
        try {
            $validator = Validator::make($data_item, $this->rules(), $this->messages());
            $validator->validate();
            return $validator->valid();
        }
        catch (ValidationException $e) {
            Log::warning($e->validator->errors()->first() .'| in '. static::class);
            throw $e;
        }
    }

    /**
     * describe validation rules for data
     * @return array
     */
    abstract protected function rules() : array;

    /**
     * describe error messages for data validation
     * @return array
     */
    abstract protected function messages() : array;
}
