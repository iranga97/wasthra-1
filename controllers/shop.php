<?php

class Shop extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->render('shop/shop');
    }
}