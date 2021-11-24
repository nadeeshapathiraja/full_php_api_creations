<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  // Validate.
 

  // Sanitize.
  
  $indexnumber = mysqli_real_escape_string($con, (int)$request->indexnumber);
  $fullname = mysqli_real_escape_string($con, trim($request->fullname));
  $ininame = mysqli_real_escape_string($con, trim($request->ininame));
  $address = mysqli_real_escape_string($con, trim($request->address));
  $dob = mysqli_real_escape_string($con, trim($request->dob));
  $gender = mysqli_real_escape_string($con, trim($request->gender));
  $school = mysqli_real_escape_string($con, trim($request->school));
  $grade = mysqli_real_escape_string($con, trim($request->grade));
  $parentname = mysqli_real_escape_string($con, trim($request->parentname));
  $nic = mysqli_real_escape_string($con, trim($request->nic));
  $mobile = mysqli_real_escape_string($con, (int)$request->mobile);
  $fixed = mysqli_real_escape_string($con, (int)$request->fixed);
  $email = mysqli_real_escape_string($con, trim($request->email));
  


  // Create.
  $sql = "INSERT INTO `policies`(`userid`,`indexnumber`,`fullname`,`ininame`,`address`,`dob`,`gender`,`school`,`grade`,`parentname`,`nic`,`mobile`,`fixed`,`email`) VALUES 
  (null,'{$indexnumber}','{$fullname}','{$ininame}','{$address}','{$dob}','{$gender}','{$school}','{$grade}','{$parentname}','{$nic}'
  ,'{$mobile}','{$fixed}','{$email}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $policy = [
      'indexnumber' => $indexnumber,
      'fullname' => $fullname,
      'ininame' => $ininame,
      'address' => $address,
      'dob' => $dob,
      'gender' => $gender,
      'school' => $school,
      'grade' => $grade,
      'parentname' => $parentname,
      'nic' => $nic,
      'mobile' => $mobile,
      'fixed' => $fixed,
      'email' => $email,


      'userid'    => mysqli_insert_id($con)
    ];
    echo json_encode($policy);
  }
  else
  {
    http_response_code(422);
  }
}