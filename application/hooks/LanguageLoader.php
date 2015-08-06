<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 6/27/15
 * Time: 3:22 PM
 */

class LanguageLoader
{
	function initialize() {
		$ci =& get_instance();
		$ci->load->helper('language');

		$site_lang = $ci->session->userdata('site_lang');
		/**
		 * List of files need to be reloaded each time new language is loaded
		 */
		$arrayFiles = array('field', 'title', 'form_validation', 'db', 'error', 'tooltip');
		if ($site_lang) {
			$ci->lang->load($arrayFiles,$ci->session->userdata('site_lang'));
		} else {
			$ci->lang->load($arrayFiles,'english');
		}
	}
}