<?php

class Common {
  public static function get_user_val($name) {
    if (isset($_POST[$name])) {
      return $_POST[$name];
    } else if (isset($_SESSION['customer'])) {
      $customer = $_SESSION['customer'];
      if ($customer->get{ucfirst($name)}() != '') {
        return $customer->get{ucfirst($name)}();
      }
    }
    return '';
  }
  
  public static function get_post_val($name) {
    if (isset($_POST[$name])) {
      return $_POST[$name];
    }
    return '';
  }
}
