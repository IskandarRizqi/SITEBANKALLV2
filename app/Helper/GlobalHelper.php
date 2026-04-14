<?php

namespace App\Helper;

class GlobalHelper
{
    public static function imagecheckbase64($html)
    {
        $mime_array = [
            'data:image/png',
            'data:image/jpeg',
            'data:image/jpeg',
            'data:image/jpeg',
            'data:image/gif',
            'data:image/bmp',
            'data:image/vnd.microsoft.icon',
            'data:image/tiff',
            'data:image/tiff',
            'data:image/svg+xml',
            'data:image/svg+xml',
            'data:image/webp'
        ];
        $prall = preg_match_all('@src="([^"]+)"@', $html, $match);
        $src = array_pop($match);
        $error = 0;
        $img = [];
        foreach ($src as $key => $v) {
            $dataimg = substr($v, 0, strpos($v, ";base64,"));
            if ($dataimg != '') {
                if (!in_array($dataimg, $mime_array)) {
                    $error = 1;
                }
            }
            array_push($img, $dataimg);
        }

        return $error;
    }
}
