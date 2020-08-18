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

    public function getProperties() 
    {
        return get_object_vars($this);
    }

    public function getPropertiesNames()
    { 
        return array_keys(get_object_vars($this)); 
    }
}

