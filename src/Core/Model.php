<?php

namespace App\src\Core;

class Model
{
    protected function hydrate($data)
    {
        foreach ($data as $key => $attribute) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($attribute);
            }
        }
    }
}
