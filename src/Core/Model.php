<?php

namespace App\src\Core;

class Model
{
    protected function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getProperties()
    {
        return get_object_vars($this);
    }
}
