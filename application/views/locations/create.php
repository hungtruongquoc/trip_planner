<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/11/15
 * Time: 3:52 PM
 */
// Initializes data for outputing HTML
$urlCancel = base_url('locations/index');
$urlSubmit = 'locations/create';
// Starts outputing HTML
$this->load->view('forms/location', array('urlCancel'=>$urlCancel, 'urlSubmit'=>$urlSubmit));

