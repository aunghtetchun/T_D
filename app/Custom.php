<?php


namespace App;


class Custom
{
    public static $info =  [

        "name" => "Lucky MM",
        "short_name" => "Lucky MM",
        "type" => "Lucky MM",
        "phone" => "09691496115",
        "address" =>"Unknown",
        "meta-img" => "f/img/meta.jpg",
        "mms-logo" => "dashboard/images/mms-logo.jpg",
        "c-logo" => "dashboard/images/mms-logo.jpg",
        "main_css" => "dashboard/css/bootstrap.min.css",
    ];
    public static function toShort($text,$max=30){
        if(strlen($text) >= $max){
            return substr($text,0,$max)."...";
        }else{
            return $text;
        }
    }

}
