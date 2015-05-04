<?php
define ('USERNAME_EXISTS', -2);
define ('REGISTRATION_SUCCESS', 1);
define ('LOGIN_SUCCESS', 1);
define ('REGISTRATION_FAILURE', -1);
define ('NEW_USER', 0);
define ('PASS_SALT', 'skd9879sd#@sdfsd987987');

class Customer {
  function getStatus() {
    return $this->status;
  }

  function setStatus($status) {
    $this->status = $status;
  }

  function getUser() {
    return $this->user;
  }

  function getEmail() {
    return $this->email;
  }

  function getFname() {
    return $this->fname;
  }

  function getLname() {
    return $this->lname;
  }

  function getSex() {
    return $this->sex;
  }

  function getDob() {
    return $this->dob;
  }

  function getPhone() {
    return $this->phone;
  }

  function getAddress() {
    return $this->address;
  }

  function getCity() {
    return $this->city;
  }

  function getState() {
    return $this->state;
  }

  function getZip() {
    return $this->zip;
  }

  function setUser($user) {
    $this->user = $user;
  }

  function setPass($pass) {
    $this->pass = sha1($pass . PASS_SALT);
  }

  function setEmail($email) {
    $this->email = $email;
  }

  function setFname($fname) {
    $this->fname = $fname;
  }

  function setLname($lname) {
    $this->lname = $lname;
  }

  function setSex($sex) {
    $this->sex = $sex;
  }

  function setDob($dob) {
    $this->dob = $dob;
  }

  function setPhone($phone) {
    $this->phone = $phone;
  }

  function setAddress($address) {
    $this->address = $address;
  }

  function setCity($city) {
    $this->city = $city;
  }

  function setState($state) {
    $this->state = $state;
  }

  function setZip($zip) {
    $this->zip = $zip;
  }
  
  function setCustomerID($customer_id) {
    $this->customer_id = $customer_id;
  }
  
  function getCustomerID() {
    return $this->customer_id;
  }
  
  public static function factoryByProperty($user, $pass, $email='', $fname='', $lname='', $sex='', 
          $dob='', $phone='', $address='', $city='', $state='', $zip='', $customer_id) {
    $cust = new Customer();
    $cust->setUser($user);
    $cust->setPass($pass);
    $cust->setEmail($email);
    $cust->setFname($fname);
    $cust->setLname($lname);
    $cust->setSex($sex);
    $cust->setDob($dob);
    $cust->setPhone($phone);
    $cust->setAddress($address);
    $cust->setCity($city);
    $cust->setState($state);
    $cust->setZip($zip);
    $cust->setCustomerID($customer_id);
    return $cust;
  }

  public function __construct($user='', $pass='', $email='', $fname='', $lname='', $sex='', 
          $dob='', $phone='', $address='', $city='', $state='', $zip='') {
    $this->setStatus(NEW_USER);
    if (!empty($user) && !empty($pass)) {
      $this->setUser($user);
      $this->setPass($pass);
      $this->setEmail($email);
      $this->setFname($fname);
      $this->setLname($lname);
      $this->setSex($sex);
      $this->setDob($dob);
      $this->setPhone($phone);
      $this->setAddress($address);
      $this->setCity($city);
      $this->setState($state);
      $this->setZip($zip);
      //lookup user
      $query = "select count(*) from customer where username='$user'";
      $result = db_query($query);
      $rows = mysqli_fetch_row($result);
      $count = $rows[0];
      if ((int)$count) {
        $this->setStatus(USERNAME_EXISTS);
        return $this;
      }

      $dob_store = '';
      if (!empty($dob)) {
        list($month, $day, $year) = explode('/', $dob);
        $dob_store = $year . '-' . $month . '-' . $day;
      }
      $query = "insert into customer (fname,lname,sex,dob,email,username,"
              . "`password`,phone,address_1,city,state,zip) values "
              . "('$fname','$lname','$sex','$dob_store','$email',"
              . "'$user','$pass','$phone','$address','$city','$state','$zip');";
      $result = db_query($query);
      if ($result === TRUE) {
        $this->setStatus(REGISTRATION_SUCCESS);
      }
      else {
        $this->setStatus(REGISTRATION_FAILURE);
      }
    }
  }
  
  public static function getCustomer() {
    if (isset($_SESSION['customer'])) {
      $cust = $_SESSION['customer'];
      if ($cust->getStatus() == REGISTRATION_SUCCESS) {
        return $cust;
      }
    }
    return FALSE;
  }
  
  public static function login($user, $pass) {
    if (empty($user) && empty($pass)) {
      return FALSE;
    }
    $query = "select * from customer where username='$user' and password='$pass'";
    $result = db_query($query);
    $row = mysqli_fetch_object($result);
    if (empty($row)) {
      return FALSE;
    }
    
    $cust = self::factoryByProperty($row->username,
            $row->password, 
            $row->email, 
            $row->fname, 
            $row->lname, 
            $row->sex, 
            $row->dob,
            $row->phone, 
            $row->address_1, 
            $row->city, 
            $row->state, 
            $row->zip,
            $row->customer_id);
    $cust->setStatus(LOGIN_SUCCESS);
    return $cust;
  }
}
