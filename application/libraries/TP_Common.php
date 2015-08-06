<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/5/15
 * Time: 7:19 PM
 */


class TP_Common{
	/**
	 * @param $target
	 * @return DateTime
	 */
	public static function convertIntoDate($target){
		$CI =& get_instance();
		$CI->load->library('session');
		$components = date_parse_from_format($CI->session->site_date_parsing, $target);
		extract($components);
		return date_create("$year/$month/$day");
	}

	const SECURITY_FILTER_STRING = 'trim|required|alpha_numeric_spaces_vietnam|strip_tags';
}