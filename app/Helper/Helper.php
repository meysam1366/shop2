<?php

namespace App\Helper;

use Intervention\Image\Facades\Image;

class Helper {

    /**
     * @param $file
     * @param null $watermark
     * @param null $with
     * @param null $height
     */

    private static $file,$watermark,$with,$height,$direction;

    /**
     * @param $direction
     * @param $file
     * @param null $watermark
     * @param null $with
     * @param null $height
     * @return string
     */
    public static function uploadFile($direction, $file, $watermark=null, $with=null, $height=null)
    {
        self::$file = $file;
        self::$watermark = $watermark;
        self::$watermark = $watermark;
        self::$with = $with;
        self::$height = $height;
        self::$direction = $direction;

        if (self::validationExtension(self::$file->getClientOriginalExtension())) {
            $image = Image::make(self::$file->getRealPath());
            if (self::$with && self::$height) {
                $image->resize(self::$with,self::$height);
            }
            if (self::$with) {
                $image->resize(self::$with,null);
            }
            if (self::$height) {
                $image->resize(null,self::$height);
            }
            if (self::$watermark) {
                $image->text(self::$watermark);
            }
            $image->save(public_path().self::$direction.self::$file->getClientOriginalName());
            return self::$file->getClientOriginalName();
        }

        return '';
    }

    private static function validationExtension($extension)
    {
        if ($extension == 'png' ||
            $extension == 'jpg' ||
            $extension == 'jpeg') {
            return true;
        }
        return false;
    }

}
