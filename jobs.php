<?php
  require_once PROJECT_ROOT . '/classes/db/job.php';
  if (isset($_GET['job_id'])) {
    $job = Job::getJob($_GET['job_id']);
  }
  else {
    $jobs = Job::getJobs();
  }
?>
<div class="inner cover">
  <?php if (!isset($_GET['job_id'])): ?>
  <h2>Jobs @ Women's Era</h2>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="job-list">
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Job Title</td>
              <td>Location</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($jobs as $job) { ?>
              <tr>
                <td><a href="?q=jobs&job_id=<?php echo $job->job_id; ?>"><?php echo $job->job_name; ?></a></td>
                <td><?php echo $job->job_location; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php else: ?>
  <h2><?php echo $job->job_name; ?></h2>
  <div class="job-description"><?php echo $job->job_description; ?></div>
  <p class="job-text">Job Location: <?php echo $job->job_location; ?></p>
  <p class="job-text">Recruiter: <?php echo $job->recruiter_name; ?></p>
  <p class="job-text">Recruiter contact: <?php echo $job->recruiter_phone; ?></p>
  <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 job-apply">
      <a href="?q=jobapply&job_id=<?php echo$job->job_id; ?>" class="btn btn-large btn-block btn-primary">Apply</a>
    </div>
  </div>
  <?php endif; ?>
</div>