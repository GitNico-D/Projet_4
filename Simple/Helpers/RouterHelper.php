<?php

class RouterHelper {

    /**
     * getPageIx
     *
     * @param mixed $get
     * @return void
     */
    public static function getPageIx($get) {
        $pageIx = 0;
        var_dump($get);

        if (array_key_exists("pageIx", $get) && isset($get["pageIx"]) && is_numeric($get["pageIx"]) 
            && $get["pageIx"] >= 0) {
            $pageIx = $get["pageIx"];
            var_dump($pageIx);
        }

        return $pageIx;
    }


    public static function parseUrl($url)
    {
        $fragments = parse_url($url);
        var_dump($fragments);
    }
}