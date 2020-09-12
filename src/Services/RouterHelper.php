<?php

namespace App\src\Services;

use Exception;

class RouterHelper
{
    /**
     * getChapterId
     *
     * @param array $get
     * @return int
     * @throws Exception
     */
    public static function getChapterId(array $get)
    {
        if (array_key_exists("chapterId", $get) && isset($get["chapterId"]) && is_numeric($get["chapterId"]) && $get["chapterId"] >= 0) {
            $chapterId = $get["chapterId"];
        } else {
            throw new Exception("Chapitre introuvable !");
        }
        return $chapterId;
    }

    /**
     * getCommentId
     *
     * @param array $get
     * @return int
     * @throws Exception
     */
    public static function getCommentId(array $get)
    {
        if (array_key_exists("commentId", $get) && isset($get["commentId"]) && is_numeric($get["commentId"]) && $get["commentId"] >= 0) {
            return $get["commentId"];
        } else {
            throw new Exception("Commentaire introuvable !");
        }
    }
}
