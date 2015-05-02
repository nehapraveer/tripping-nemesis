<?php

class product {

  public function getProduct_name() {
    return $this->product_name;
  }

  public function getProduct_desc() {
    return $this->product_description;
  }
  
  public function getImageUrl() {
    return $this->image_url;
  }

  public function getProduct_Price() {
    return $this->product_price;
  }

  public function get_size() {
    return $this->size;
  }

  public function setProduct_desc($product_description) {
    $this->$product_description = $product_description;
  }

  public function setProduct_name($product_name) {
    $this->product_price = $product_name;
  }

  public function setProduct_Size($size) {
    $this->size = $size;
  }

  public function setProduct_Price($product_price) {
    $this->product_price = $product_price;
  }

  public function listProducts() {
    $query = "select * from product";
    $result = db_query($query);
    $products = array();
    while ($obj = $result->fetch_object()) {
      $products[] = $obj;
    }
    return $products;
  }
  public function getProduct($product_id){
    $query="SELECT * FROM product where product_id=$product_id ";
    $result=  db_query($query);
    $obj=$result->fetch_object();
    return $obj;
  }

}

?>
