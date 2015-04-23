<?php

function get_page_name() { 
  $page_name = isset($_GET['q']) ? $_GET['q'] : 'home';
  return $page_name;
}

function get_page() {
  return get_page_name() . '.php';
}

?>
