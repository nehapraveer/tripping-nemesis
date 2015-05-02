<?php

require_once PROJECT_ROOT . '/config/config.php';

function db_connect() {

  // Define connection as a static variable, to avoid connecting more than once 
  static $connection;
  global $conf;

  // Try and connect to the database, if a connection has not been established yet
  if (!isset($connection)) {
    // Load configuration as an array. Use the actual location of your configuration file
    
    $connection = mysqli_connect('localhost', $conf['mysql_user'], $conf['mysql_pass'], $conf['mysql_dbname']);
  }

  // If connection was not successful, handle the error
  if ($connection === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
    return mysqli_connect_error();
  }
  return $connection;
}

function db_query($query) {
  // Connect to the database
  $connection = db_connect();
  if ($connection == NULL) {
    throw new Exception('Db Exception', 501);
  }
  // Query the database
  $result = mysqli_query($connection, $query);
  if ($result === FALSE) {
    print_r(mysqli_error($connection));
    return;
  }
  return $result;
}
