<?php
$login_err=FALSE;
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  if (!empty(session_id())) {
    session_destroy();
  }
}
if (isset($_GET['action']) && $_GET['action'] == 'login') {
  $cust = Customer::login(Common::get_user_val('username'),
            Common::get_user_val('password'));
  if($cust==FALSE){
   $login_err=TRUE;
  }
  else {
    if (!empty(session_id())) {
      session_destroy();
      session_start();
    }
    $_SESSION['customer'] = $cust;
    header('Location: index.php');
    exit();
  }
}
?>
<form action="?q=login&action=login" method="post" class="loginform well">
  <div class="row">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input name="username" id="first_name" class="form-control" placeholder="Username" tabindex="1" type="text" >
    </div>
  </div>
  <div class="row">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input name="password" id="first_name" class="form-control" placeholder="Password" tabindex="2" type="password" >
    </div>
  </div>
  <?php if ($login_err): ?>
    <div class="row error">
      <div class="col-xs-12 col-md-3"></div>
      <label class="col-xs-12 col-md-6"><i class="glyphicon glyphicon-remove"></i>&nbsp;Invalid username or password</label>
    </div>
  <?php endif; ?>
    <div class="row">
      <div class="col-xs-12 col-md-6"><input value="Login" name="submit" class="btn btn-primary btn-block btn-lg" tabindex="3" type="submit"></div>
      <div class="col-xs-12 col-md-6"><a name="Register" class="btn btn-success btn-block btn-lg" tabindex="3" type="submit" href="./?q=register">Register</a></div>
    </div>
</form>