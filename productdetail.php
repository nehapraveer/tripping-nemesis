<?php
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $product = new product();
  $product_detail = $product->getProduct($product_id);
  $sizes = explode(',', $product_detail->size);
} else {
  exit();
}
?>
<form method="POST" action="?q=checkout">
  <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
  <input type="hidden" name="image_url" value="<?php echo $product_detail->image_url;?>">
  <input type="hidden" name="product_name" value="<?php echo $product_detail->product_name;?>">
  <input type="hidden" name="product_price" value="<?php echo $product_detail->product_price;?>">
<div class="inner cover">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <image src="<?php echo $product_detail->image_url; ?>" class="list-image"/>
      <div class="row"><?php echo $product_detail->product_name; ?></div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="product-desc">
        <div class="product-title"><?php echo ucfirst($product_detail->product_name); ?></div>
        <?php echo $product_detail->product_description; ?></div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 form-group quantity-text">
      <div class="col-xs-5 col-sm-5 col-md-5 product-size">
        Size:
        <select name="size">
          <?php foreach ($sizes as $size) { ?>
          <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">Quantity</div>
      <div class="col-xs-3 col-sm-3 col-md-3">
        <input name="quantity" id="quantity" 
               class="form-control" tabindex="1" 
               type="text" value="1" size="5" maxlength="5">
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 product-price">$<?php echo $product_detail->product_price; ?></div>
    <div class="col-xs-12 col-sm-6 col-md-6">
      <input class="col-xs-12 btn btn-success btn-block btn-lg" name="cartsubmit" 
             type="submit" value="Add to cart">
    </div>
  </div>
</div>
</form>
