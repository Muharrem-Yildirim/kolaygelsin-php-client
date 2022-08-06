<?php

namespace MuharremYildirim\KolayGelsin\Traits;

use Exception;

trait Fillable
{
    /**
     * fill
     *
     * @param  array $data
     * @return self
     */
    public function fill(array $data): self
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        return $this;
    }

    /**
     * isFillable
     *
     * @param  string $key
     * @return boolean
     */
    protected function isFillable($key): bool
    {
        if (!property_exists($this, 'fillable')) {
            return false;
        }

        return in_array($key, $this->fillable);
    }

    /**
     * getFillables
     *
     * @return array
     */
    public function getFillables(): array
    {
        if (!property_exists($this, 'fillable')) {
            return [];
        }

        $values = [];

        foreach ($this->fillable as $field) {
            if (property_exists($this, $field)) {
                $values[$field] = $this->$field;
            }
        }

        return $values;
    }


    /**
     * __set
     *
     * @param  string $name
     * @param  mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        if (!$this->isFillable($name)) {
            throw new Exception(sprintf('Property %s is not fillable.', $name));
        }

        $this->$name = $value;
    }
}
