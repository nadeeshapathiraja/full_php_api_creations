<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  if ((int)$request->indexnumber < 1 ) {
    return http_response_code(400);
  }

  // Sanitize.
  // $id    = mysqli_real_escape_string($con, (int)$request->id);
  // $number = mysqli_real_escape_string($con, trim($request->number));
  // $amount = mysqli_real_escape_string($con, (float)$request->amount);

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

  // Update.
  //$sql = "UPDATE `policies` SET `number`='$number',`amount`='$amount' WHERE `id` = '{$id}' LIMIT 1";
  $sql="UPDATE `student` SET `indexno`='$indexno' , `fullname`='$fullname' , `ininame`='$ininame' ,
   address='$address', dob='$dob',gender='$gender', school='$school',
`grade`='$grade', `parentname`='$parentname' , `mobile`='$mobile', `fixed`='$fixed' WHERE `indexno`={$indexno} LIMIT 1";
  
  
  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}