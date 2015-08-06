<?php
class Admin extends TP_Controller {

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('expense_model');
    }

    public function index()
    {
        $this->setTitle($this->lang->line('title_admin'));

        $this->load->view('templates/header', $this->data);
        $this->load->view('admin/index', $this->data);
        $this->load->view('templates/footer');
    }
}
