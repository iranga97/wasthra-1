<?php

class Wishlist extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::customerOnly();
    }

    function index(){
        
        $this->view->wishlistqtyList =  $this->model->getwishlistDetails();      
        $this->view->wishlistimageList =  $this->model->getwishlistImages();

        $this->view->qtyList = $this->model->getAllDetails();
        $this->view->imageList =  $this->model-> getImages();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->colorList =  $this->model->getColors();
        
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> Wishlist';
        $this->view->render('user/wish_list');
        
    }

    function addToWishlist($id){

        $this->model->create($id);
        header('location: '.URL.'');

   }

    function removeFromWishlist($id){

        $this->model->delete($id);
        header('location: '.URL.'wishlist');

}


}