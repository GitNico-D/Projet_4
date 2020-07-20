<?php

namespace App\src\Services;

use Exception;

class RouterHelper {

    /**
     * getPageIx
     *
     * @param mixed $get
     * @return void
     */
    public static function getPageIx(Array $get) 
    {
        $pageIx = 0;
        if (array_key_exists("pageIx", $get) && isset($get["pageIx"]) && is_numeric($get["pageIx"]) && $get["pageIx"] >= 0) 
        {
            $pageIx = $get["pageIx"];
        }
        return $pageIx;
    }

    public static function getChapterId(Array $get)
    {
        if (array_key_exists("chapterId", $get) && isset($get["chapterId"]) && is_numeric($get["chapterId"]) && $get["chapterId"] >= 0)
        {
           return $get["chapterId"];
        } 
        else 
        {
            throw new Exception ("Chapitre introuvable !");
        }
    }

    public static function getCommentId(Array $get)
    {
        if (array_key_exists("commentId", $get) && isset($get["commentId"]) && is_numeric($get["commentId"]) && $get["commentId"] >= 0)
        {
           return $get["commentId"];
        } 
        else 
        {
            throw new Exception ("Commentaire introuvable !");
        }
    }
}