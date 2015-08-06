<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 6/22/15
 * Time: 8:26 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TP_Controller extends CI_Controller {

	protected $data;
	/**
	 * @var String
	 */
	protected $date_format;
	/**
	 * @var String
	 */
	protected $date_parsing_format;
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em;

	protected $ModelName;
	/**
	 * @var CI_Security
	 */
	public $security;

	/**
	 * @var CI_Input
	 */
	public $input;

	/**
	 * @var CI_Session
	 */
	public $session;

	public function __construct()
	{
		// Do something with $params
		parent::__construct();
		// Loads controller name by default to the view
		$this->loadControllerName();
		// Gets the default date format for different languages
		$this->getDateFormat();
		$this->getJsDateFormat();
		$this->em = $this->doctrine->em;
	}

	protected function loadControllerName(){
		$className = get_called_class();
		$this->data['ControllerName'] = strtolower($className);
	}

	protected function setTitle($title){
		$this->data['Title'] = ucwords($title);
	}

	protected function renderView($view = "", $useTemplate = TRUE){
		$this->data['ActionName'] = strtolower($this->get_function_name());
		if ($useTemplate) $this->load->view('templates/header', $this->data);
		$defaultFolder = strtolower(get_called_class());
		if($view === ""){
			$view = $this->get_function_name();
		}
		$this->load->view($defaultFolder . '/' . $view, $this->data);
		if ($useTemplate) $this->load->view('templates/footer', $this->data);
	}

	/**
	 * Sets date format for the controller
	 */
	protected function getDateFormat(){
		$this->date_format = $this->session->site_date_format;
		$this->date_parsing_format = $this->session->site_date_parsing;
	}

	protected function getJsDateFormat(){
		$this->data['SiteDateJs'] = $this->session->site_date_js;
	}

	/**
	 * @return mixed
	 */
	private function get_function_name(){
		$trace=debug_backtrace();
		$caller=$trace[2];
		return $caller['function'];
	}

	/**
	 * @param $object
	 * @param $fieldNames
	 */
	protected function setStringDataFromPost(&$object, $fieldNames){
		if(isset($this->ModelName) && !is_null($this->ModelName) && $this->ModelName !== ''){
			if(is_array($fieldNames) && count($fieldNames) > 0){
				foreach($fieldNames as $fieldName){
					if(class_exists($this->ModelName) && property_exists($this->ModelName, $fieldName)){
						$value = addslashes($this->security->xss_clean($this->input->post(strtolower($fieldName))));
						$object->{'set'.$fieldName} ($value);
					}
				}
			}
		}
	}

	/**
	 * @param $url
	 * @param $caption
	 * @param $tooltip
	 * @param $tooltipPosition
	 * @return string
	 */
	protected function getActionAnchor($url, $caption, $tooltip, $tooltipPosition){
		return anchor($url, $caption, array('data-position'=>$tooltipPosition, 'class'=>'tp_tr_link tooltiped',
						'data-tooltip'=>$tooltip));
	}
}