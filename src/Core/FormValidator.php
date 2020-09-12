<?php

namespace App\src\Core;

class FormValidator
{    
    /**
     * checkField
     * Vérifie les champs de la méthode $_POST et renvoie le ou les erreurs correponsdantes
     * @param  mixed $post
     * @return array
     */
    public static function checkField($post)
    {
        $errors = [];
        foreach ($post as $postKey => $postValue) {
            $errorField = self::notBlank($postValue);
            if ($errorField) {
                $errors [] = $errorField;
            } elseif ($postKey === 'content') {
                $errorContent = self::checkFieldContent($postValue);
                if ($errorContent) {
                    $errors [] = $errorContent;
                }
            } elseif ($postKey === 'author') {
                $errorAuthor = self::checkFieldAuthor($postValue);
                if ($errorAuthor) {
                    $errors [] = $errorAuthor;
                }
            } elseif ($postKey === 'title') {
                $errorTitle = self::checkFieldTitle($postValue);
                if ($errorTitle) {
                    $errors [] = $errorTitle;
                }
            } elseif ($postKey === 'imgUrl') {
                $errorImgUrl = self::checkFieldImgUrl($postValue);
                if ($errorImgUrl) {
                    $errors [] = $errorImgUrl;
                }
            } elseif ($postKey === 'loginsEmail') {
                $errorEmail = self::checkFieldEmail($postValue);
                if ($errorEmail) {
                    $errors [] = $errorEmail;
                }
            }
        }
        return array_unique($errors);
    }
    
    /**
     * notBlank
     *
     * @param  mixed $postValue
     * @return void
     */
    public static function notBlank($postValue)
    {
        if (empty($postValue)) {
            return 'Veuillez remplir les champs';
        }
    }
    
    /**
     * checkFieldAuthor
     *
     * @param  mixed $author
     * @return void
     */
    public static function checkFieldAuthor($author)
    {
        if (strlen($author) < 2) {
            return "Le pseudonyme est trop court (minimum 2 caractères)";
        }
        if (strlen($author) > 25) {
            return "Le pseudonyme est trop long (maximum 25 caractères)";
        }
    }
    
    /**
     * checkFieldTitle
     *
     * @param  mixed $title
     * @return void
     */
    public static function checkFieldTitle($title)
    {
        if (strlen($title) < 2) {
            return "Le titre est trop court (minimum 2 caractères)";
        }
        if (strlen($title) > 255) {
            return "Le titre est trop long (maximum 255 caractères)";
        }
    }
    
    /**
     * checkFieldContent
     *
     * @param  mixed $content
     * @return void
     */
    public static function checkFieldContent($content)
    {
        if (strlen($content) < 5) {
            return "Votre message doit contenir au moins 5 caractères";
        }
    }
    
    /**
     * checkFieldImgUrl
     *
     * @param  mixed $imgUrl
     * @return void
     */
    public static function checkFieldImgUrl($imgUrl)
    {
        if (empty($imgUrl)) {
            return "Merci de renseigner l'url de l'image du chapitre";
        }
    }
    
    /**
     * checkFieldEmail
     *
     * @param  mixed $email
     * @return void
     */
    public static function checkFieldEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "E-mail " . $email . " est invalide";
        }
    }
}
