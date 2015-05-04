<?php
  $cust = Customer::getCustomer();
  if ($cust == FALSE) {
    ob_end_clean();
    header('Location: ?q=login&redir=checkout');
    exit();
  }
  $cart_items = Order::getCartItems();
  $total_price = 0;
  if (empty($cart_items)) {
    exit();
  }
?>
<form method="POST" action="?q=order">
  <div class="inner cover">
    <h2>Order Checkout</h2>
    <div class="row checkout">
      <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="row cart-item">
          <div class="col-xs-1 col-sm-1 col-md-1"></div>
          <div class="col-xs-4 col-sm-4 col-md-4 text-container">Product</div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">Size</div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">Quantity</div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">Price</div>
        </div>
        <?php foreach ($cart_items as $item) { ?>
        <div class="row cart-item">
          <div class="col-xs-1 col-sm-1 col-md-1 checkout-img-container">
            <img src="<?php echo $item['image_url']; ?>" class="checkout-img">
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4 text-container">
            <a class="vcenter" 
               href="?q=productdetail&product_id=<?php echo $item['product_id']; ?>">
                 <?php echo $item['product_name']; ?>
            </a>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">
            <?php echo $item['size']; ?>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-container">
            <?php echo $item['quantity']; ?>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 price">
            $<?php 
            $price = $item['product_price']*$item['quantity'];
            echo sprintf('%3.2f', $price); 
            $total_price += $price;
            ?>
          </div>
          <div class="col-xs-1 col-sm-1 col-md-1 remove">
            <a href="?q=checkout&remove_id=<?php echo $item['product_id']; ?>" class="glyphicon glyphicon-remove text-danger"></a>
          </div>
        </div>
        <?php } ?>
        <div class="row total">
          <div class="col-xs-5 col-sm-5 col-md-5"></div>
          <div class="col-xs-4 col-sm-4 col-md-4">Order Total</div>
          <div class="col-xs-2 col-sm-2 col-md-2 price">
            $<?php echo sprintf('%3.2f', $total_price); ?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 well">
        <h4 class="no-pad no-margin">Billing</h4>
        <form>
          <div class="order row">
            <div class="col-xs-6 col-sm-6 col-md-6 order-input">
                <input name="fname" class="form-control" placeholder="Firstname" tabindex="1" type="text"
                       value="<?php echo $cust->getFname(); ?>">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 order-input">
                <input name="lname" class="form-control" placeholder="Lastname" tabindex="1" type="text"
                       value="<?php echo $cust->getLname(); ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 order-input">
                <input name="cardnumber" class="form-control" placeholder="Card Number" tabindex="1" type="text">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 order-text">
                Expiration
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 order-text">
                Security code
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 order-input">
                <input name="expire" class="form-control" placeholder="MM/YYYY" tabindex="1" type="text">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 order-input">
                <input name="cvv" class="form-control" placeholder="CVV" tabindex="1" type="text">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 order-text">
                      Billing address
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 order-input">
                <input name="address" class="form-control" placeholder="Address" tabindex="1" type="text"
                       value="<?php echo $cust->getAddress(); ?>">
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 order-input">
                <input name="city" class="form-control" placeholder="City" tabindex="1" type="text"
                       value="<?php echo $cust->getCity(); ?>">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 order-input">
                <input name="state" class="form-control" placeholder="State" tabindex="1" type="text"
                       value="<?php echo $cust->getState(); ?>">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 order-input">
                <input name="zip" class="form-control" placeholder="Zip" tabindex="1" type="text"
                       value="<?php echo $cust->getZip(); ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 order-text">
                      Shipping address
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 order-input">
                <input name="address" class="form-control" placeholder="Address" tabindex="1" type="text"
                       value="<?php echo $cust->getAddress(); ?>">
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 order-input">
                <input name="city" class="form-control" placeholder="City" tabindex="1" type="text"
                       value="<?php echo $cust->getCity(); ?>">
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 order-input">
                <input name="state" class="form-control" placeholder="State" tabindex="1" type="text"
                       value="<?php echo $cust->getState(); ?>">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 order-input">
                <input name="zip" class="form-control" placeholder="Zip" tabindex="1" type="text"
                       value="<?php echo $cust->getZip(); ?>">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-success">
              Shipping: 2-day Free
            </div>
            <div class="col-xs-12 col-md-12">
              <input value="Place Order" name="submit" class="btn btn-primary btn-block btn-lg" tabindex="7" type="submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</form>