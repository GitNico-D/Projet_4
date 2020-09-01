<?php

namespace App\src\Core;

use Exception;

class FormValidator
{
    public static function notBlank($value)
    {
        if(empty($value)) {
            return false;
        }
    }

}