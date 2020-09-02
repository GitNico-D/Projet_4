<?php

namespace App\src\Services;

use Exception;

class FormVerificationHelper
{
    // public $errors = [];

    public static function checkField($post) 
    {
        $errors = [];
        foreach ($post as $postKey => $postValue) {
            $errorField = self::notBlank($postValue);
            if($errorField) {
            $errors [] = $errorField;
            } elseif ($postKey === 'content') {
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
            elseif ($postKey === 'loginsEmail') {
                $errorEmail = self::checkFieldEmail($postValue);
                if ($errorEmail) {
                    $errors [] = $errorEmail;
                }
                }
        }
        // array_pus($errors, $error);
        return array_unique($errors);
    }

    public static function notBlank($postValue) 
    {
        if(empty($postValue)) {
            return 'Veuillez remplir les champs';
        }
    }

    public static function checkFieldAuthor($author)
    {
        if (strlen($author) < 2) {
            return "Le pseudonyme est trop court, minimum 2 caractères";
        }
        if (strlen($author) > 25) {
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

    public static function checkFieldEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "E-mail " . $email . " est invalide";
        }
    }

}
