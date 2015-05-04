<?php
require_once PROJECT_ROOT . '/classes/db/job.php';
if (isset($_POST['jobsubmit'])) {
  $reference = Job::apply();
} else {
  $job = Job::getJob($_GET['job_id']);
}
?>
<div class="inner cover">
  <?php if (isset($_POST['jobsubmit'])): ?>
    <h2>Thank you for applying, we will get in touch with you shortly!</h2>
    <p>Please take a note of you application reference number: 
      <strong><?php echo $reference; ?></strong></p>
    <div class="row">
      <div class="col-xs-offset-3 col-md-offset-3 col-xs-4 col-sm-4 col-md-4">
        <a href="?q=jobs" class="btn btn-primary btn-large btn-block">
          Apply for more jobs
        </a>
      </div>
    </div>
  <?php else: ?>
    <form action="?q=jobapply" method="post">
      <input type="hidden" name="job_id" value="<?php echo $_GET['job_id']; ?>">
      <h2>Apply for <?php echo $job->job_name; ?></h2>
      <div class="row">
        <p class="job-text">Job Location: <?php echo $job->job_location; ?></p>
        <p class="job-text">Recruiter: <?php echo $job->recruiter_name; ?></p>
        <p class="job-text">Recruiter contact: <?php echo $job->recruiter_phone; ?></p>
      </div>
      <div class="row job-applicant">
        <h3>Enter your details</h3>
        <div class="col-xs-3 col-sm-3 col-md-3 job-row">
          <input type="text" name="fname" placeholder="Firstname"/>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 job-row">
          <input type="text" name="lname" placeholder="Lastname"/>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 job-row">
          <input type="text" name="email" placeholder="Email"/>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 job-row">
          <input type="text" name="phone" placeholder="Phone"/>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 job-row">
          <input type="text" size="56" name="address" placeholder="Address (including city, state and zip)"/>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 job-row">
          <input type="text" name="dob" placeholder="DOB (MM/DD/YYYY)"/>
        </div>
        <div class="form-group row sex-row form-inline">
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
        <div class="col-xs-12 col-sm-12 col-md-12 job-row">
          <textarea name="experience" class="form-control" rows="3" placeholder="Experience"></textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 job-row">
          <textarea name="skills" class="form-control" rows="3" placeholder="Skills"></textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 job-row">
          <textarea name="education" class="form-control" rows="3" placeholder="Education"></textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 job-row">
          <div class="col-xs-offset-3 col-md-offset-3 col-xs-4 col-sm-4 col-md-4">
            <input name="jobsubmit" class="btn btn-primary btn-large btn-block job-submit" type="submit" value="Submit">
          </div>
        </div>
      </div>
    </form>
  <?php endif; ?>
</div>