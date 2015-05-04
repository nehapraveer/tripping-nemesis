<?php

class Job {

  public static function getJobs() {
    //get all jobs
    $query = "select job_id, job_name, job_location from jobs";
    $result = db_query($query);
    $jobs = array();
    while ($obj = $result->fetch_object()) {
      $jobs[] = $obj;
    }
    return $jobs;
  }
  
  public static function getJob($job_id) {
    //get all jobs
    $query = "select * from jobs where job_id='$job_id'";
    $result = db_query($query);
    $job = $result->fetch_object();
    return $job;
  }
  
  protected static function generateReferenceNumber() {
    $jobrefchars = '0123456789';
    $ref_num = '';
    for ($i = 0; $i < 10; $i++) {
      $ref_num .= $jobrefchars[rand(0, strlen($jobrefchars) - 1)];
    }
    return 'J-' . $ref_num;
  }
  
  public static function apply() {
    $job_id = Common::get_post_val('job_id');
    $fname = Common::get_post_val('fname');
    $lname = Common::get_post_val('lname');
    $email = Common::get_post_val('email');
    $phone = Common::get_post_val('phone');
    $address = Common::get_post_val('address');
    list($month, $day, $year) = explode('/', Common::get_post_val('dob'));
    $dob_date = $month . '-' . $day . '-' . $year;
    $sex = Common::get_post_val('sex');
    $experience = Common::get_post_val('experience');
    $skills = Common::get_post_val('skills');
    $education = Common::get_post_val('education');
    $applied_on = date('M-d-Y');
    $ref_num = self::generateReferenceNumber();
    
    $query = "insert into job_applicant (fname, lname, sex, dob, email, education, experience,"
            . "skills, phone, address_1, job_id, applied_on, job_reference_num) values ('$fname',"
            . "'$lname', '$sex', '$dob_date', '$email', '$education', '$experience', '$skills',"
            . "'$phone', '$address', '$job_id', '$applied_on', '$ref_num');";
    db_query($query);
    return $ref_num;
  }

}
