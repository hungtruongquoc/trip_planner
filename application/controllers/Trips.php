<?php
use TP\Trip;

class Trips extends TP_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->ModelName = 'TP\Trip';
    }

    public function index()
    {
	    $resultSet = $this->em->getRepository($this->ModelName)->findBy(array(), array('Id'=>'DESC'));
	    $trips = array();
	    foreach($resultSet as $trip){
            $deleteUrl = $this->getActionAnchor('trips/delete/' . $trip->getId(),
                            '<span class="red-text icon-Delete-File"></span> Delete',
                            $this->lang->line('tooltip_delete_trip'), 'left');
            $editUrl = $this->getActionAnchor('trips/detail/' . $trip->getId(),
                            '<span class="blue-text icon-Pen-2"></span> Edit',
                            $this->lang->line('tooltip_edit_trip'), 'right');
            $actionLink = anchor('#', '<i class="material-icons">more_vert</i>', array('data-constrainwidth'=>'false',
                'class'=>'dropdown-button tp-icon', 'data-activates'=>'item-actions'
            ));
            $actionUl = ul(array($deleteUrl, $editUrl), array('id'=>'item-actions', 'class'=>'dropdown-content'));
			$trips[] = array($actionLink. $actionUl, $trip->getDateStart()->format('m/d/Y'), $trip->getDateEnd()->format('m/d/Y'),
                                stripslashes($trip->getName()) . '<p class="help-block">' . stripslashes($trip->getDescription()) . '</p>','');
	    }
        $this->data['trips'] = $trips;
        $this->setTitle(ucwords($this->lang->line('Title_TripList')));
	    $this->renderView();
    }

    /**
     * @param $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function delete($id){
        $currentTrip = $this->em->find($this->ModelName, $id);
        try{
            $this->em->remove($currentTrip);
            $this->em->flush();
            $this->session->set_flashdata('success_message', 'trip_deleted');
        }catch(\Doctrine\ORM\TransactionRequiredException $ex){
            $this->session->set_flashdata('error_message', 'trip_deleted_failed_related_entities');
        }
        redirect('trips/index');
    }

    public function view($slug = NULL)
    {
        $this->data['expense'] = $this->expense_model->get_expense($slug);

        if (empty($this->data['expense']))
        {
           show_404();
        }

		$this->setTitle($this->data['expense']['Name']);
		$this->renderView();
    }

    public function detail($id){
        $this->setTitle($this->lang->line('title_trip_detail'));
        $currentTrip = $this->em->find('TP\Trip', $id);
        $this->data['trip'] = $currentTrip;
        $this->renderView();
    }

    public function create()
    {
        $this->setTitle($this->lang->line('title_new_trip'));
		// Uses the default validation classes to validate the data
        $this->form_validation->set_rules('name', 'lang:name', 'trim|required|alpha_numeric_spaces_vietnam|strip_tags');
	    $this->form_validation->set_rules('description', 'lang:description', 'trim|required|alpha_numeric_spaces_vietnam|strip_tags');
        $this->form_validation->set_rules('dateStart', 'lang:date_start' , "required|validate_date[{$this->date_format}]|strip_tags");
	    $this->form_validation->set_rules('dateEnd', 'lang:date_end' , "required|validate_date[{$this->date_format}]|strip_tags");

        if ($this->form_validation->run() === FALSE)
        {
			$this->renderView();
        }
        else
        {
	        $newTrip = new Trip();
	        $dateStart = TP_Common::convertIntoDate($this->input->post('dateStart'));
	        $dateEnd = TP_Common::convertIntoDate($this->input->post('dateEnd'));
	        $newTrip->setDateStart($dateStart);
	        $newTrip->setDateEnd($dateEnd);
	        $newTrip->setName(addslashes($this->security->xss_clean($this->input->post('name'))));
	        $newTrip->setDescription(addslashes($this->security->xss_clean($this->input->post('description'))));
	        try{
                if($newTrip->isValid()) {
                    $this->em->persist($newTrip);
                    $this->em->flush();
                    $this->session->set_flashdata('success_message', 'new_trip_saved');
                    redirect('trips/index');
                }else{
                    $this->session->set_flashdata('error_message', 'invalid_date_range');
                    $this->renderView();
                }
	        }catch(Exception $e){
		        $this->renderView();
	        }
        }
    }
}
