<?php
class Expense extends TP_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('expense_model');
    }

    public function index()
    {
	    $this->data['expenses'] = $this->expense_model->get_expense();
        $this->setTitle('Expense List');

        $this->load->view('templates/header', $this->data);
        $this->load->view('expense/index', $this->data);
        $this->load->view('templates/footer');
    }

    public function view($slug = NULL)
    {
        $this->data['expense'] = $this->expense_model->get_expense($slug);

        if (empty($this->data['expense']))
        {
           show_404();

        }

       $this->setTitle($this->data['expense']['Name']);

       $this->load->view('templates/header', $this->data);
       $this->load->view('expense/view', $this->data);
       $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->setTitle('Create an expense');

        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('Description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $this->data);
            $this->load->view('expense/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->expense_model->insert_expense();
            $this->load->view('expense/success');
        }
    }
}
