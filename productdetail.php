<?php
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $product = new product();
  $product_detail = $product->getProduct($product_id);
}
else {
  exit();
}

?>

<div class="inner cover">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <image src="<?php echo $product_detail->image_url;  ?>" class="list-image"/>
      <div class="row"><?php echo $product_detail->product_name; ?></div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="product-desc">
        <div class="product-title"><?php echo ucfirst($product_detail->product_name); ?></div>
        <?php echo $product_detail->product_description; ?></div>
      <div class="product-size">Size: <?php echo $product_detail->size; ?></div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
      <a class="col-xs-12 btn btn-success btn-block btn-lg">Add to Cart</a>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      
    </div>
  </div>
  
</div>