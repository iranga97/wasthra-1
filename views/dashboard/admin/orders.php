<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Orders</h2><br>
    </div>
    <div class="row-right">
        <a href="<?php echo URL ?>report" class="btn">Generate Report</a>
    </div>
    <div class="row-top">
        <div class="order-container" >
                   <table class="order-list">
                       <tr>
                           <td><img src="<?php echo URL?>public/images/product-1.jpg"></td>
                           <td class="order-details"><h4>ORDER ID: ORD0001</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                            <td class="order-messages">
                              <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"> New</h5>
                              </div>
                              <div class="order-note">
                                <li style="color: red;">No delivery is set</li>
                              </div>
                            </td>
                           <td><a href="#" class="btn table-btn">View Order</a></td>
                       </tr>
                       <tr>
                           <td><img src="public/images/product-2.jpg"></td>
                           <td class="order-details"><h4>ORDER ID: ORD0002</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                            <td class="order-messages"><h4>Message </h4>
                            <h5>Message</h5>
                            <h5>message</h5></td>
                           <td><a href="#" class="btn table-btn">View Order</a></td>
                       </tr>
                       <tr>
                           <td><img src="public/images/product-3.jpg"></td>
                           <td class="order-details"><h4>ORDER ID: ORD0003</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                            <td class="order-messages"><h4>Message </h4>
                            <h5>Message</h5>
                            <h5>message</h5></td>
                           <td><a href="#" class="btn table-btn">View Order</a></td>
                       </tr>
                   </table>     
                    </div>

</div>

 </div>

<?php require 'views/footer_dashboard.php'; ?>