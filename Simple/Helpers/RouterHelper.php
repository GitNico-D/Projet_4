<?php

class RouterHelper {

    public static function getPageIx($get) {
        $pageIx = 0;

        if (array_key_exists("pageIx", $get) && isset($get["pageIx"]) && is_numeric($get["pageIx"]) 
            && $get["pageIx"] >= 0) {
            $pageIx = $get["pageIx"];
        }

        return $pageIx;
    }

}