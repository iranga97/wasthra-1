<?php require 'views/header.php'; ?>


<div class="small-container">
    <div class="row">
        <h2 class="title">Order Details</h2><br>
    </div>
    <div class="row-top">
        <div class="col-2">
            <div class="box-container" >
                <h3>Items</h3>
                <table class="order-list order-items">
                <?php $subTotal=0; 
                    foreach($this->orderInfo as $details){
                        $this->productname=''; 
                        $subTotal+=$details['product_price']*$details['item_qty'];
                    }?>


                 <?php foreach($this->orderDetails as $history) ?>
                    <tr>
                        <td><img src="<?php echo URL.$history['image']?>"></td>
                        <td class="order-details">
                            <h4><?php echo $history['product_name'] ?></h4>
                            <h5><?php echo $history['product_price'] ?></h5>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: <?php echo $history['item_color'] ?>"></span>
                                <label class="input-data">Size:<?php echo $history['item_size'] ?></label>
                                <label class="input-data">Qty: <?php echo $history['item_qty'] ?></label>
                            </div>
                        </td>
                    </tr>
                 <? endforeach;?>   
                </table>     
            </div>
        </div>
        <div class="col-2">
            <div class="row">
                <div class="box-container" >
                    <h3>Summary</h3>
                    <div class="summary-info">
                        <div class="row" style="justify-content: left; margin-left: 5px;">
                            <div class="col-2" style="min-width: 0;">
                            <?php foreach($this->orderSummary as $summary) ?>
                                <h4>Order ID: <?php echo $summary['order_id']?></h4>
                                <h5>Date: <?php echo $summary['date']?>   Time: <?php echo $summary['time']?></h5>
                                <h5>Payment Method:<?php echo $summary['payment_method']?></h5>
                            <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"> <?php echo $summary['order_status']?></h5>
                              </div>
                        </div>
                                
                        </div>
                        
                        
                    </div>
                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>LKR <?php echo number_format($subTotal,2,'.','');?> </td>
                            </tr>
                            <tr>
                                <td>Delivery chargers</td>
                                <?php $fee=0;
                                    foreach ($this->deliveryCharges as $delivery){
                                        if($delivery['city']==$this->allDetails[0][11]){
                                            $fee=$delivery['delivery_fee'];
                                            $subTotal+=$fee;
                                        }
                                    }?>
                                <td>LKR<?php echo number_format($fee,2,'.','');?></td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>LKR <?php echo number_format($subTotal,2,'.','');?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box-container">
                    <div class="delivery-info">
                        <div class="row">
                            <h3>Delivery Info</h3>
                        </div>
                        <div class="row">
                            <div class="col-2" style="min-width: 0;">
                            <?php foreach($this->historyInfo as $info)?>
                                <label class="address">
                                    To:<br>
                                    <?php echo $info['first_name']?> <?php echo $info['last_name']?><br>
                                    <?php echo $info['address_line_1']?><br>
                                    <?php echo $info['address_line_2']?><br>
                                    <?php echo $info['address_line_3']?><br>
                                    <?php echo $info['city']?><br>
                                    <?php echo $info['postal_code']?>
                                </label>
                               
                            </div>
                            <div class="col-2" style="min-width: 0;">
                                    <label class="address">
                                    Expected Delivery Date: 05/05/2020<br><br>
                                    Actual Delivery Date: 05/05/2020<br>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'views/footer.php'; ?>