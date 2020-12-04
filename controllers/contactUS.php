<?php

class ContactUs extends Controller {
    
    function __construct() {

        parent::__construct();
    }
    
    /**
     * Diplay the contact us page
     *
     * @return void
     */
    function index() {
        
        $this->view->title = 'Contact Us';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Contact Us';

        // get product list with images
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();

        $this->view->render('user/contactUS');
    }
}
