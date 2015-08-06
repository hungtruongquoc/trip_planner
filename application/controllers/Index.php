<?php
class Index extends TP_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->setTitle("Hello to trips planner");
        $this->renderView();
    }

}
