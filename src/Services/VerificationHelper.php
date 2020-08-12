<?php

namespace App\src\Services;

use Exception;

class VerificationHelper
{
    public static function notBlank($post)
    {
        var_dump($post);
        $postNull = [];
        foreach($post as $postKey => $postValue) {
            if(empty($postValue)) {
                $postNull [] = $postKey;
                var_dump($postNull);
                // throw new Exception ('Les champs ' . implode(', ', $postNull) .  ' ne sont pas remplis');
            }                    
        }
        return $error = 'Les champs ' . implode(', ', $postNull) .  ' ne sont pas remplis';
        // throw new Exception ('Les champs ' . implode(', ', $postNull) .  ' ne sont pas remplis');
    }
}
