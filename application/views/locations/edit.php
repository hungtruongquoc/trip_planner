<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/11/15
 * Time: 10:17 PM
 */
// Initializes data for outputing HTML
$urlCancel = base_url('locations/index');
$urlSubmit = 'locations/edit/' . $location->getId();
// Starts outputing HTML
$this->load->view('forms/location', array('urlCancel'=>$urlCancel, 'urlSubmit'=>$urlSubmit));