<?php

class RouterHelper {

    /**
     * getPageIx
     *
     * @param mixed $get
     * @return void
     */
    public static function getPageIx(Array $get) {
        $pageIx = 0;
        // var_dump($get);

        if (array_key_exists("pageIx", $get) && isset($get["pageIx"]) && is_numeric($get["pageIx"]) 
            && $get["pageIx"] >= 0) {
            $pageIx = $get["pageIx"];
            var_dump($pageIx);
        }
        return $pageIx;
    }


    public static function getChapterId(Array $get)
    {
        if (array_key_exists("chapterId", $get) && isset($get["chapterId"]) && is_string($get["chapterId"]))
        {
            $chapterId = $get["chapterId"];
        }
        return $chapterId;
    }
}