<?php

class ProductCategory extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->render('dashboard/admin/ProductCategory');
    }
}