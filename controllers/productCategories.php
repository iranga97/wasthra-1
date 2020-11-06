<?php

class ProductCategories extends Controller{
    function __construct()
    {
        parent::__construct();
        // Authenticate::adminAuth();
    }

    function index(){
    	$this->view->productcatList = $this->model->listProductcat();
    	$this->view->render('dashboard/admin/product_category');
    }

   
    function create(){
    	$data= array();
    	$data['category_id']= $_POST['product_category_id'];
    	$data['name']=$_POST['category_name'];

    	$this->model->create($data);
    	header('location: '.URL.'productCategories');
    }
     

    function edit($id){
       $this->view->getproductcategory = $this->model->getProductcat($id);
       $this->view->render('dashboard/admin/edit_productcat');
    }

    function editSave(){
        $data = array();
        $data['prev_id'] = $_POST['prev_id'];
        $data['category_id'] = $_POST['product_category_id'];
        $data['name'] = $_POST['category_name'];

        $this->model->update($data);
        header('location: '.URL.'productCategories');
    }

    function delete($id){
        $this->model->delete($id);
        header('location:'.URL.'productCategories');
    }

}