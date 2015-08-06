<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 6/27/15
 * Time: 3:35 PM
 */
class LangSwitch extends CI_Controller
{
	public function __construct() {
		parent::__construct();
	}

	function switchLanguage($language = "") {
		// Uses 'english' as our main language when nothing is found
		$language = ($language != "") ? $language : 'english';
		$isEnglish = ($language === "english");
		// Chooses the correct date format according to the language
		$date_format = $isEnglish ? 'm/d/y,/' : 'd/m/y,/';
		$date_locale_js = $isEnglish ? 'en' : 'vi';
		$date_parse_format = $isEnglish ? 'm/d/Y' : 'd/m/Y';
		// Stores default language into the session
		$this->session->set_userdata('site_lang', $language);
		// Stores the date format into the session
		$this->session->set_userdata('site_date_format', $date_format);
		// Stores the date locale for javascript
		$this->session->set_userdata('site_date_js', $date_locale_js);
		// Stores the date format for parsing
		$this->session->set_userdata('site_date_parsing', $date_parse_format);
		// Uses the HTTP_REFERER of $_SERVER to get back to where we were
		redirect($_SERVER['HTTP_REFERER']);
	}
}