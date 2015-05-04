<?php
$cust = Customer::getCustomer();
if (isset($_POST['placeorder']) && $cust != FALSE) {
  $order = new Order();
  $order_result = $order->placeOrder($cust);
} else {
  ob_end_clean();
  header('Location: ?q=login&redir=checkout');
  exit();
}
?>
<div class="inner cover">
  <?php if(!empty($order_result)) { 
    $order_items = $order_result['order_items'];
    $order_total = $order_result['order_total'];
    ?>
  <h2>Order Confirmation</h2>
  <div class="row order-confirm">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <span>Invoice number:<strong> <?php echo $order_result['invoice_number']; ?></strong></span>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="order-detail">
        <div class="row cart-item">
          <div class="col-xs-1 col-sm-1 col-md-1">No.</div>
          <div class="col-xs-4 col-sm-4 col-md-4 text-container">Product</div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">Size</div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">Quantity</div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">Price</div>
        </div>
        <?php foreach ($order_items as $index => $order_item) { ?>
        <div class="row cart-item">
          <div class="col-xs-1 col-sm-1 col-md-1"><?php echo $index+1; ?>.</div>
          <div class="col-xs-4 col-sm-4 col-md-4 text-container"><?php echo $order_item['product_name']; ?></div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container"><?php echo $order_item['size']; ?></div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container"><?php echo $order_item['quantity']; ?></div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">$<?php echo number_format($order_item['item_price'], 2); ?></div>
        </div>
        <?php } ?>
        <div class="row order-total">
          <div class="col-xs-5 col-sm-5 col-md-5"></div>
          <div class="col-xs-4 col-sm-4 col-md-4">Order Total</div>
          <div class="col-xs-2 col-sm-2 col-md-2">$<?php echo number_format($order_total, 2); ?>.</div>
        </div>
        <div class="row address">
          <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-2 col-sm-offset-2 col-md-offset-2">
            <address>
              <strong>Billing address:</strong><br>
              <?php echo Common::get_post_val('fname') . Common::get_post_val('lname'); ?><br>
              <?php echo Common::get_post_val('billaddress') ;?><br>
              <?php echo Common::get_post_val('billcity');?>, 
              <?php echo Common::get_post_val('billstate');?> <?php echo Common::get_post_val('billzip');?><br>
            </address>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <address>
              <strong>Shipping address:</strong><br>
              <?php echo Common::get_post_val('fname') . Common::get_post_val('lname'); ?><br>
              <?php echo Common::get_post_val('address') ;?><br>
              <?php echo Common::get_post_val('city');?>, 
              <?php echo Common::get_post_val('state');?> <?php echo Common::get_post_val('zip');?><br>
            </address>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>