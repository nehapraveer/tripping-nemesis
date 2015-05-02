<?php
$product = new product();
$products = $product->listProducts();
shuffle($products);
$row_counter = 0;
?>

<div class="inner cover">
  <?php foreach ($products as $product) { ?>
      <a class="col-xs-12 col-sm-3 col-md-3 list-product" 
         href="?q=productdetail&product_id=<?php echo $product->product_id ?>">
        <image src="<?php echo $product->image_url;  ?>" class="list-image"/>
        <div class="row"><?php echo $product->product_name; ?></div>
      </a>
  <?php } ?>
</div>