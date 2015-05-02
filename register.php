<?php 
  $username_status = NULL;
  if (isset($_POST['submit'])) {
    $cust = new Customer(Common::get_user_val('user'), 
            Common::get_user_val('pass'), 
            Common::get_user_val('email'), 
            Common::get_user_val('fname'), 
            Common::get_user_val('lname'), 
            Common::get_user_val('sex'), 
            Common::get_user_val('dob'),
            Common::get_user_val('phone'), 
            Common::get_user_val('address'), 
            Common::get_user_val('city'), 
            Common::get_user_val('state'), 
            Common::get_user_val('zip'));
    
    $username_status = $cust->getStatus();
    if ($username_status == REGISTRATION_SUCCESS) {
      if (!empty(session_id())) {
        session_destroy();
        session_start();
      }
      $_SESSION['customer'] = $cust;
      require_once 'registersuccess.php';
      return;
    }
  }
?>
<h2>Registration</h2>
<form action="?q=register" method="post">
  <hr class="colorgraph">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <input name="fname" id="first_name" class="form-control" placeholder="First Name" tabindex="1" type="text" 
               value="<?php echo Common::get_user_val('fname'); ?>">
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <input name="lname" id="last_name" class="form-control" placeholder="Last Name" tabindex="2" type="text"
               value="<?php echo Common::get_user_val('lname'); ?>">
      </div>
    </div>
  </div>
  <div class="form-group 
      <?php if ($username_status != NULL && $username_status == USERNAME_EXISTS) {
        echo 'has-error has-feedback';
      }
      ?>">
    <input name="user" id="username" class="form-control" placeholder="Username" tabindex="4" type="text"
           value="<?php echo Common::get_user_val('user'); ?>">
    <?php if ($username_status != NULL && $username_status == USERNAME_EXISTS): ?>
      <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
    <?php endif; ?>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <input name="pass" id="password" class="form-control" placeholder="Password" tabindex="5" type="password">
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <input name="pass_confim" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6" type="password">
      </div>
    </div>
  </div>
  <div class="form-group">
    <input name="email" id="email" class="form-control" placeholder="Email Address" tabindex="4" type="email"
           value="<?php echo Common::get_user_val('email'); ?>">
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <input name="address" id="address" class="form-control" placeholder="Address line 1" tabindex="5" type="text"
               value="<?php echo Common::get_user_val('address'); ?>">
      </div>
    </div>
    <div class="col-xs-6 col-sm-4 col-md-4">
      <div class="form-group">
        <input name="city" id="password_confirmation" class="form-control" placeholder="City" tabindex="6" type="text"
               value="<?php echo Common::get_user_val('city'); ?>">
      </div>
    </div>
    <div class="col-xs-6 col-sm-2 col-md-2">
      <div class="form-group">
        <input name="state" id="password_confirmation" class="form-control" placeholder="State" tabindex="6" type="text"
               value="<?php echo Common::get_user_val('state'); ?>">
      </div>
    </div>
  </div>
  <div class="form-group">
    <input name="phone" id="email" class="form-control" placeholder="Phone number" tabindex="4" type="text"
           value="<?php echo Common::get_user_val('phone'); ?>">
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="form-group">
        <span class="radio">
          <label>
            <input type="radio" name="sex" id="optionsRadios1" value="male">
            Male
          </label>
        </span>
        <span class="radio">
          <label>
            <input type="radio" name="sex" id="optionsRadios2" value="female">
            Female
          </label>
        </span>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div id="datetimepicker1" class="input-append">Date of birth
        <input data-format="MM/dd/yyyy" type="text" name="dob" placeholder="mm/dd/yyyy"
               value="<?php echo Common::get_user_val('dob'); ?>">
        <span class="add-on">
          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
          </i>
        </span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="checkbox">
        <label><input type="checkbox" name="agree">
          By clicking <strong class="label label-primary">Register</strong>, you agree to the  set out by this site, including our Cookie Use.
        </label>
      </div>
    </div>
  </div>

  <hr class="colorgraph">
  <div class="row">
    <div class="col-xs-12 col-md-3"></div>
    <div class="col-xs-12 col-md-6"><input value="Register" name="submit" class="btn btn-primary btn-block btn-lg" tabindex="7" type="submit"></div>
    <div class="col-xs-12 col-md-3"></div>
  </div>
</form>