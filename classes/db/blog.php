<?php

class Blog {

  public static function getBlogs() {
    //get all jobs
    $query = "select * from blog b inner join customer c where "
            . "b.customer_id=c.customer_id";
    $result = db_query($query);
    $blogs = array();
    while ($obj = $result->fetch_object()) {
      $created_date = strtotime($obj->created);
      $obj->created_date = date('d M Y', $created_date);
      $blogs[] = $obj;
    }
    return $blogs;
  }
  
  public static function postBlog() {
    $cust = Customer::getCustomer();
    $customer_id = $cust->getCustomerID();
    $blog_title = Common::get_post_val('blog_title');
    $blog_content = Common::get_post_val('blog_content');
    $post_date = date('Y-m-d');
    $query = "insert into blog (customer_id, blog_title, blog_description, created) values"
            . " ('$customer_id', '$blog_title', '$blog_content', '$post_date');";
    db_query($query);
  }

}
