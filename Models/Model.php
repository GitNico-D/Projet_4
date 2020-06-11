<?php

class Model 
{
    protected function hydrate(array $data)
    {
        foreach ($data as $key => $attribute)
        {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($attribute);
            }
        }
    }
}