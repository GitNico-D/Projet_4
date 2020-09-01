<?php

namespace App\src\Services;

use Exception;

class FormVerificationHelper
{
    public static function checkField($post) 
    {
        var_dump($post);
        foreach ($post as $postKey => $postValue) {
            var_dump($postKey);
            var_dump($postValue);
            if ($postKey == "author") {
                $error = self::checkFieldAuthor($postValue);
            } elseif ($postKey == "title") {
                $error = self::checkFieldTitle($postValue);
            } elseif ($postKey == "content") {
                $errors = self::checkFieldContent($postValue);
            }
            return $error;
                // switch ($postKey) {
                //     case "author":
                //         return $error;
                //     break;
                //     case "title":
                //         $error = self::checkFieldTitle($postValue);
                //     break;
                //     case "content":
                //         return $error;
                //     break;
                //     default;
                // }
            }
            // var_dump($error);
            // return $error;
                // throw new Exception ('Les champs ' . implode(', ', $postNull) .  ' ne sont pas remplis');
    }

    public static function checkFieldAuthor($postAuthorValue)
    {
        if (strlen($postAuthorValue) < 2) {
            return "Le pseudonyme est trop court, minimum 2 caractères";
        }
        if (strlen($postAuthorValue) > 50) {
            return "Le pseudonyme est trop long, maximum 50 caractères";
        }
    }

    private static function checkFieldTitle($title)
    {
        if (strlen($title) < 2) {
            return "Le titre est trop court, minimum 2 caractères";
        }
        if (strlen($title) > 255) {
            return "Le titre est trop long, maximum 255 caractères";
        }
    }

    private static function checkFieldContent($content)
    {
        if(strlen($content) < 5) {
            return "Votre message doit contenir au moins 5 caractères";
        }
    }
}
