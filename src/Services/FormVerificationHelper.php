<?php

namespace App\src\Services;

use Exception;

class FormVerificationHelper
{
    public static function checkField($post) 
    {
        var_dump($post);
        // $postNull = [];
        foreach ($post as $postKey => $postValue) {
            $value = str_replace('logins', '', $postKey);
            var_dump($postKey);
            var_dump($postValue);

            var_dump($value);
                switch ($value) {
                    case "author":
                        $error = self::checkFieldAuthor($postValue);
                    break;
                    case "title":
                        $error = self::checkFieldTitle($postValue);
                    break;
                    case "content":
                        $error = self::checkFieldContent($postValue);
                    break;
                    default;
                }
            }
            var_dump($error);
            return $error;
                // throw new Exception ('Les champs ' . implode(', ', $postNull) .  ' ne sont pas remplis');
    }

    public static function checkFieldAuthor($postAuthorValue)
    {
        if (empty($postAuthorValue)) {
            var_dump($postAuthorValue);
            return "Le nom de l'auteur n'est pas indiqué";
        }
        if (strlen($postAuthorValue) < 2) {
            return "Le nom de l'auteur est trop court, minimum 2 caractères";
        }
        if (strlen($postAuthorValue) > 50) {
            return "Le nom de l'auteur est trop long, maximum 50 caractères";
        }
    }

    private static function checkFieldTitle($title)
    {
        if (empty($title)) {
            return "Le nom de l'auteur n'est pas indiqué";
        }
        if (strlen($title) < 2) {
            return "Le nom de l'auteur est trop court, minimum 2 caractères";
        }
        if (strlen($title) > 255) {
            return "Le nom de l'auteur est trop long, maximum 255 caractères";
        }
    }

    private static function checkFieldContent($content)
    {
        if(empty($content)) {
            return "Le nom de l'auteur n'est pas indiqué";
        }
        if(strlen($content) < 5) {
            return "Le nom de l'auteur est trop court, minimum 5 caractères";
        }
    }
}
