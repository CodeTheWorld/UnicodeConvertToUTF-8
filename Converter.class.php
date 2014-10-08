<?php
/**
 * Created by deshengkong.
 * Date: 14-10-8
 * Time: 下午4:28
 */

class Converter {
    public static function convert($unicode) {
        $str = "";
        if ($unicode < 0x80) {
            $str .= chr($unicode);
        } else if ($unicode < 0x800) {
            $str .= chr(0xC0 | $unicode >> 6); //110xxxxx
            $str .= chr(0x80 | $unicode & 0x3F); //10xxxxxx
        } else if ($unicode < 0x10000) {
            $str .= chr(0xE0 | $unicode >> 12); //1110xxxx
            $str .= chr(0x80 | $unicode >> 6 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode & 0x3F); //10xxxxxx
        } else if ($unicode < 0x200000) {
            $str .= chr(0xF0 | $unicode >> 18); //11110xxx
            $str .= chr(0x80 | $unicode >> 12 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode >> 6 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode & 0x3F); //10xxxxxx
        } else if ($unicode < 0x4000000) {
            $str .= chr(0xF80 | $unicode >> 24); //111110xx
            $str .= chr(0x80 | $unicode >> 18 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode >> 12 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode >> 6 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode & 0x3F); //10xxxxxx
        } else if ($unicode < 0x80000000) {
            $str .= chr(0xFC | $unicode >> 30); //1111110x
            $str .= chr(0x80 | $unicode >> 24 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode >> 18 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode >> 12 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode >> 6 & 0x3F); //10xxxxxx
            $str .= chr(0x80 | $unicode & 0x3F); //10xxxxxx
        }
        return $str;
    }
}