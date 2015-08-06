<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 6/26/15
 * Time: 5:48 PM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class TP_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
}