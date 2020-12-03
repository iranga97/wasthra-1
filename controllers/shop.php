<?php

class Shop extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> Shop';
        
    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();

    	$this->view->render('shop/shop');
    }

    function productDetails($id){
        $this->view->title = 'Product Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'shop">Shop</a> <i class="fas fa-angle-right"></i> Product Details';
        
    	$this->view->productList = $this->model->listProducts();
    	$this->view->product = $this->model->getProduct($id);
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->reviews = $this->model->reviewDetails($id);
        $this->view->reviewImageList = $this->model->reviewImages();

    	$this->view->render('shop/product_details');
    }

    function byColor($color){
    	$this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Color';
        
    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('color','#'.$color);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories(); 
        $this->view->selected = '#'.$color;  
    	$this->view->render('shop/shop');
    }

    function bySize($size){
    	$this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Size';
        
    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('size',$size);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->selected = $size;
    	$this->view->render('shop/shop');
    }

    function byCategory($category){
    	$this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Category';
        
    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('category',$category);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->selected = $category;   
    	$this->view->render('shop/shop');
    }

    function addReview($id){
        
        $this->view->productName = $this->model->getProductName($id);
        $this->view->render('user/add_review');
    }

    function submitReview(){
        
        $imageName['img']=$_FILES['img']['name'];
        $imageName['temp']=$_FILES['img']['tmp_name'];
        for ($x=0; $x<sizeof($imageName['temp']); $x++){
            move_uploaded_file ($imageName['temp'][$x] , 'C:\xampp\htdocs\wasthra\public\images\Review_images\\'.$imageName['img'][$x]);
        }
        $data = array();
        $data['product_id'] = $_POST['product_id'];
        $data['comment'] = $_POST['comment'];
        $data['rating'] = $_POST['rating'];
        $data['user_id'] = $_POST['user_id'];

        $date = date("Y-m-d");
        date_default_timezone_set(" India Standard Time");
        $time = date("H:i:s");
        $this->model->addReview($data,$date,$time,$imageName['img']);
        header('location: '.URL.'shop/productDetails/'.$data['product_id']);
    }

    function deleteReview($id,$productId){
        
        $this->model->deleteReview($id);
        header('Location: '.URL.'shop/productDetails/'.$productId);
    }

    function checkout(){
        
    	$this->view->title = 'Checkout';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'cart">Cart</a> <i class="fas fa-angle-right"></i> Checkout';
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();
    	$this->view->render('checkout/index');
    }

    function pay(){
        $this->view->title = 'Payment';
        if($_POST['payment_method']=='online'){
            $this->view->render('checkout/payment');
        } else{
            $this->view->render('order/order_details');
        }
        
        $data = array();
    	$data['address_line_1'] = $_POST['address_line_1'];
        $data['address_line_2'] = $_POST['address_line_2'];
        $data['address_line_3'] = $_POST['address_line_3'];
        $data['city'] = $_POST['city'];
        $data['postal_code'] = $_POST['postal_code'];
        
        if($data['address_line_1']!=Session::get('addressData')['address_line_1']
            || $data['address_line_2']!=Session::get('addressData')['address_line_2']
            || $data['address_line_3']!=Session::get('addressData')['address_line_3']
            || $data['city']!=Session::get('addressData')['city']
            || $data['postal_code']!=Session::get('addressData')['postal_code']){
            
            $this->model->create($data);
        }
        $date = date("Y-m-d");
        date_default_timezone_set(" India Standard Time");
        $time = date("H:i:s");
        $orderID = 'ORD';
        $orderID .= $date;
        $orderID .= $time;
        $orderID .= Session::get('userId');
        $orderID = str_replace("-", "", $orderID);
        $orderID = str_replace(":", "", $orderID);
        $payMethod = $_POST['payment_method'];
        $this->model->placeOrder($date,$time,$orderID,$payMethod);

        

    }

    // function placeOrder(){
    //     $data = array();
    // 	$data['address_line_1'] = $_POST['address_line_1'];
    //     $data['address_line_2'] = $_POST['address_line_2'];
    //     $data['address_line_3'] = $_POST['address_line_3'];
    //     $data['city'] = $_POST['city'];
    //     $data['postal_code'] = $_POST['postal_code'];
        
    //     if($data['address_line_1']!=Session::get('addressData')['address_line_1']
    //         || $data['address_line_2']!=Session::get('addressData')['address_line_2']
    //         || $data['address_line_3']!=Session::get('addressData')['address_line_3']
    //         || $data['city']!=Session::get('addressData')['city']
    //         || $data['postal_code']!=Session::get('addressData')['postal_code']){
            
    //         //$this->model->create($data);
    //     }


    //     //header('location: '.URL.'orders/myOrderDetails');
    // }

}