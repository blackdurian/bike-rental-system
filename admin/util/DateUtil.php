<?php
// global date format
class DateUtil{

    private static $DATE_FORMAT = "Y-m-d H:i:s";// for mysql "YYYY-MM-DD hh:mm:ss"

    //  date to string
    public static function dateToString($php_date){
        $date = strtotime($php_date);
        return date(DateUtil::$DATE_FORMAT, $date );
    }

    public static function dateToDateString($php_date){
        $date = strtotime($php_date);
        return date("Y-m-d", $date );
    }

    // string to date 
    public static function stringToDate(string $format , string $datetime){
        return DateTime::createFromFormat($format , $datetime);
    }

    public static function getNow(){
        return date(DateUtil::$DATE_FORMAT);
    }

}

?>