<?php

namespace App\src\Services;

use Exception;

class FormVerificationHelper
{
    public static function checkField($post) 
    {
        $errors = [];
        foreach ($post as $postKey => $postValue) {
            if ($postKey === 'content') {
                $errorContent = self::checkFieldContent($postValue);
                if ($errorContent) {
                    $errors [] = $errorContent;
                }
            }
            elseif ($postKey === 'author') {
                $errorAuthor = self::checkFieldAuthor($postValue);
                if ($errorAuthor) {
                    $errors [] = $errorAuthor;
                }
            }
            elseif ($postKey === 'title') {
                $errorTitle = self::checkFieldTitle($postValue);
                if ($errorTitle) {
                    $errors [] = $errorTitle;
                }
            }
        }
        return $errors;
    }

    public static function checkFieldAuthor($postAuthorValue)
    {
        if (strlen($postAuthorValue) < 2) {
            return "Le pseudonyme est trop court, minimum 2 caractères";
        }
        if (strlen($postAuthorValue) > 25) {
            return "Le pseudonyme est trop long, maximum 25 caractères";
        }
    }

    public static function checkFieldTitle($title)
    {
        if (strlen($title) < 2) {
            return "Le titre est trop court, minimum 2 caractères";
        }
        if (strlen($title) > 255) {
            return "Le titre est trop long, maximum 255 caractères";
        }
    }

    public static function checkFieldContent($content)
    {
        if(strlen($content) < 5) {
            return "Votre message doit contenir au moins 5 caractères";
        }
    }
}
