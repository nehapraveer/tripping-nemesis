<?php

class Order {
  private static $cart_items;
  public static function addToCart($product_id, $quantity, $size, $image_url,
          $product_name, $product_price) {
    if (isset($_COOKIE['cart'])) {
      self::$cart_items = json_decode($_COOKIE['cart'], TRUE);
    }
    else {
      self::$cart_items = array();
    }
    $cart_item_found = FALSE;
    //check existing item to update quantity
    foreach (self::$cart_items as &$cart_item) {
      if ($cart_item['product_id'] == $product_id
              && $cart_item['size'] == $size) {
        $cart_item['quantity'] += $quantity;
        $cart_item_found = TRUE;
        break;
      }
    }
    if (!$cart_item_found) {
      $item = array(
        'product_id' => $product_id,
        'quantity' => $quantity,
        'size' => $size,
        'product_name' => $product_name,
        'image_url' => $image_url,
        'product_price' => $product_price
      );
      self::$cart_items[] = $item;
    }
    setcookie('cart', json_encode(self::$cart_items, TRUE));
  }
  
  public static function removeFromCart($product_id) {
    $cart_items = self::getCartItems();
    if (empty($cart_items)) {
      return;
    }
    foreach ($cart_items as $index => $item) {
      if ($item['product_id'] == $product_id) {
        unset($cart_items[$index]);
      }
    }
    self::$cart_items = array_values($cart_items);
    setcookie('cart', json_encode(self::$cart_items, TRUE));
  }
  
  public static function clearCart() {
    self::$cart_items = array();
    unset($_COOKIE['cart']);
    setcookie('cart', null, -1);
  }

  public static function getCartItems() {
    if (isset(self::$cart_items)) {
      $cart_items = self::$cart_items;
    }
    else if (isset($_COOKIE['cart'])) {
      $cart_items = json_decode($_COOKIE['cart'], TRUE);
    }
    else {
      $cart_items = array();
    }
    return $cart_items;
  }
  
  protected function generateInvoiceNumber() {
    $invoicechars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $invoice_num = '';
    for ($i = 0; $i < 24; $i++) {
      $invoice_num .= $invoicechars[rand(0, strlen($invoicechars) - 1)];
    }
    return $invoice_num;
  }
  
  public function placeOrder($cust) {
    $cart_items = self::getCartItems();
    $order_date = date('Y-m-d');
    $customer_id = $cust->getCustomerID();
    $bill_address = Common::get_post_val('billaddress');
    $bill_city = Common::get_post_val('billcity');
    $bill_state = Common::get_post_val('billstate');
    $bill_zip = Common::get_post_val('billzip');
    $ship_address = Common::get_post_val('address');
    $ship_city = Common::get_post_val('city');
    $ship_state = Common::get_post_val('state');
    $ship_zip = Common::get_post_val('zip');
    $order_total = 0;
    foreach ($cart_items as $item) {
      $item_price = $item['quantity'] * $item['product_price'];
      $order_total += $item_price;
    }
    $invoice_number = $this->generateInvoiceNumber();
    $query = "insert into `order` (customer_id,order_date,order_status,"
            . "address_1,city,state,zip, payment_type, ship_address_1, "
            . "ship_city, ship_state, ship_zip, order_total, invoice_number) values "
            . "('$customer_id','$order_date','In Process',"
            . "'$bill_address','$bill_city','$bill_state','$bill_zip',"
            . "'card','$ship_address','$ship_city','$ship_state','$ship_zip',"
            . "'$order_total','$invoice_number');";
    $order_result = db_query($query);
    $order_id = mysqli_insert_id(db_connect());
    $order_items = array();
    foreach ($cart_items as $item) {
      $product_id = $item['product_id'];
      $product_price = $item['product_price'];
      $quantity = $item['quantity'];
      $order_item_query = " insert into order_items (order_id, product_id, "
              . "product_price, product_quantity) values ('$order_id', '$product_id',"
              . "'$product_price','$quantity');";
      $order_item_result = db_query($order_item_query);
      $item_price = $item['quantity'] * $item['product_price'];
      $item['item_price'] = $item_price;
      $order_items[] = $item;
    }
    $result = array(
      'order_items' => $order_items, 
      'order_total' => $order_total,
      'invoice_number' => $invoice_number
    );
    //clear cart
    self::clearCart();
    return $result;
  }
}