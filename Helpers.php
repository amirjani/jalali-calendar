<?php

namespace App\Libraries;

use App;
use File;
use Config;
use Morilog\Jalali\jDate;
use stdClass;
use Carbon\Carbon;

class Helpers {


	public static function convertNumberToEN($str) {
		$arabic2Persian = new Helpers;
		$str			= $arabic2Persian->ArabicToPersian($str);
		$persian	= array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
		$english	= array('0','1','2','3','4','5','6','7','8','9');
		return str_replace($persian, $english, $str);
	}

	public static function EnglishToPersian($str) {
		$english	= ['0','1','2','3','4','5','6','7','8','9'];
		$persian	= ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
		return str_replace($english, $persian, $str);
	}

	public static function PersianToEnglish($str) {
		$persian	= ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
		$english	= ['0','1','2','3','4','5','6','7','8','9'];
		return str_replace($persian, $english, $str);
	}

	public static function ArabicToPersian($str) {
		$arabic		= array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩','ي','ك');
		$persian	= array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','ی','ک');
		return str_replace($arabic, $persian, $str);
	}
	
	public static function getPersianTime($time) {
		$today		= date("Y-m-d", mktime(0, 0, 0, date("m") , date("d"),   date("Y")));
		$yesterday	= date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1, date("Y")));
		$time_date	= date("Y-m-d", strtotime($time));
		if ($today == $time_date) {
			return date("H:i", strtotime($time));
		} elseif ($yesterday == $time_date) {
			return 'دیروز '.date("H:i", strtotime($time));
		} else {
			$date = jDate::forge($time_date)->format('%y/%m/%d');
			$date .= ' - '.date("H:i", strtotime($time));
			return $date;
		}
	}

	public static function getPersianDate($time) {
		$time_date = date("Y-m-d", strtotime($time));
        return jDate::forge($time_date)->format('%y/%m/%d');;
	}

    public static function getPersianYear($time)
    {
        $time_date = date("Y" , strtotime($time));
        return jDate::forge($time_date)->format('%y');
	}
	public static function getPersianMonth($time)
    {
        $time_date = date("M" , strtotime($time));
        return jDate::forge($time_date)->format('%m');
	}

	public static function getPersianDay($time)
    {
        $time_date = date("D" , strtotime($time));
        return jDate::forge($time_date)->format('%d');
	}
}