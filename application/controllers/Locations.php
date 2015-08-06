<?php
use TP\Location;
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 7/8/15
 * Time: 8:56 PM
 */
class Locations extends TP_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->ModelName = 'TP\Location';
	}

	private function setupLocationValidation(){
		// Uses the default validation classes to validate the data
		$this->form_validation->set_rules('name', 'lang:name', TP_Common::SECURITY_FILTER_STRING);
		$this->form_validation->set_rules('description', 'lang:description', TP_Common::SECURITY_FILTER_STRING);
	}

	public function index(){
		$this->setTitle($this->lang->line('title_location'));
		$resultSet = $this->em->getRepository($this->ModelName)->findBy(array(), array('Name'=>'ASC'));
		$locations = array();
		foreach($resultSet as $location){
			$deleteUrl = base_url('locations/delete/' . $location->getId());
			$editUrl = base_url('locations/edit/' . $location->getId());
			$buttonDelete = anchor($deleteUrl, '<span class="text-danger tp-icon icon-Delete-File"></span>',
									'data-toggle="tooltip" data-placement="left" class="tp_tr_link" title="'
									. $this->lang->line('Tooltip_DeleteLocation') . '"');
			$buttonEdit = anchor($editUrl, '<span class="tp-icon icon-Pen-2"></span>',
									'data-toggle="tooltip" data-placement="right" class="tp_tr_link" title="'
									. $this->lang->line('Tooltip_EditLocation') . '"');
			$locations[] = array($buttonDelete, stripslashes($location->getName()) . '<p class="help-block">'
									. stripslashes($location->getDescription()) . '</p>',
									$buttonEdit);
		}
		$this->data['locations'] = $locations;
		$this->renderView();
	}

	public function create(){
		$this->setTitle($this->lang->line('title_new_location'));
		$this->setupLocationValidation();
		if ($this->form_validation->run() === FALSE)
		{
			$this->renderView();
		}else{
			$locationNew = new Location();
			$this->setStringDataFromPost($locationNew, array('Name', 'Description'));
			try{
				$this->em->persist($locationNew);
				$this->em->flush();
				$this->session->set_flashdata('success_message', 'new_location_saved');
				redirect('locations/index');
			}catch(Exception $e){
				$this->renderView();
			}
		}
	}

	/**
	 * @param $id
	 * @throws \Doctrine\ORM\ORMException
	 * @throws \Doctrine\ORM\OptimisticLockException
	 * @throws \Doctrine\ORM\TransactionRequiredException
	 */
	public function edit($id){
		$currentLocation = $this->em->find($this->ModelName, $id);
		if(is_null($currentLocation)){
			$this->session->set_flashdata('error_message', 'Location_CouldNotFoundId');
			redirect('locations/index');
		}else{
			$this->setTitle('Edit Location');
			$this->data['location'] = $currentLocation;
			$this->em->persist($currentLocation);
			if(!is_null($this->input->post('name'))){
				// Assigns the received value to current object
				$this->setStringDataFromPost($currentLocation, array('Name', 'Description'));
				$this->setupLocationValidation();
				// Checks if the input is satisfied requirements
				if($this->form_validation->run()){
					$this->em->flush();
					$this->session->set_flashdata('success_message', 'Location_Updated');
					redirect('locations');
				}
			}
			$this->renderView();
		}
	}

	/**
	 * @param $id
	 * @throws \Doctrine\ORM\ORMException
	 * @throws \Doctrine\ORM\OptimisticLockException
	 * @throws \Doctrine\ORM\TransactionRequiredException
	 */
	public function delete($id){
		$currentLocation = $this->em->find($this->ModelName, $id);
		try{
			$this->em->remove($currentLocation);
			$this->em->flush();
			$this->session->set_flashdata('success_message', 'Location_Deleted');
		}catch(\Doctrine\ORM\TransactionRequiredException $ex){
			$this->session->set_flashdata('error_message', 'trip_deleted_failed_related_entities');
		}
		redirect('locations/index');
	}
}