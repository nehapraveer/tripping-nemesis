<?php

function activeClass($page) {
  $cur_page = get_page_name();
  if ($cur_page == $page) {
    return "active";
  }
  return "";
}
?>
<div class="masthead clearfix">
  <div class="inner">
    <span class="logo">
      <canvas id="logo" class="logo-canvas" width="70" height="70">  
        <b>Women's Era Logo</b>  
      </canvas>
      <h3 class="masthead-brand">Women's Era</h3>
    </span>
    <div class="welcome-text">
      <?php $cust = Customer::getCustomer();
      if ($cust !== FALSE):
        ?>
        <span class="menu-user">Welcome <?php echo ucfirst($cust->getFname()); ?>!</span>
      <?php
      endif;
      if (isset($_POST['cartsubmit'])) {
        Order::addToCart(Common::get_post_val('product_id'), Common::get_post_val('quantity'), Common::get_post_val('size'), Common::get_post_val('image_url'), Common::get_post_val('product_name'), Common::get_post_val('product_price'));
      } else if (isset($_GET['remove_id'])) {
        Order::removeFromCart($_GET['remove_id']);
      }
      $cart_items = Order::getCartItems();
      $count_items = count(Order::getCartItems());
      if ($count_items > 0 && get_page_name() != 'checkout' && get_page_name() != 'orderconfirm'):
        ?>
        <span class="cart-top"><a href="?q=checkout">
            <i class="glyphicon glyphicon-shopping-cart"></i> <?php echo $count_items; ?> item(s)</a></span>
<?php endif; ?>
    </div>
    <nav class="masthead-nav">
      <ul class="nav masthead-nav">
        <li class="<?php print activeClass('home'); ?>"><a href="./?q=home">Home</a></li>
        <li class="<?php print activeClass('about'); ?>"><a href="./?q=about">About</a></li>
        <li class="<?php print activeClass('contact'); ?>"><a href="./?q=contact">Contact</a></li>
        <li class="<?php print activeClass('postblog'); ?>"><a href="./?q=bloglist">Blog</a></li>
        
        <?php if ($cust === FALSE): ?>
          <li class="<?php print activeClass('login'); ?>"><a href="./?q=login">Login</a></li>
        <?php else: ?>
          <li class="<?php print activeClass('login'); ?>"><a href="./?q=login&action=logout">Logout</a></li>
<?php endif; ?>

      </ul>
    </nav>
  </div>
</div>

