<?php
/**
 * Returns the list of policies.
 */
require 'database.php';

$policies = [];
$sql = "SELECT * FROM student";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $policies[$i]['userid']    = $row['userid'];
    $policies[$i]['indexnumber']    = $row['indexnumber'];
    $policies[$i]['fullname'] = $row['fullname'];
    $policies[$i]['ininame'] = $row['ininame'];
    $policies[$i]['address']    = $row['address'];
    $policies[$i]['dob'] = $row['dob'];
    $policies[$i]['gender'] = $row['gender'];
    $policies[$i]['school']    = $row['school'];
    $policies[$i]['grade'] = $row['grade'];
    $policies[$i]['parentname'] = $row['parentname'];
    $policies[$i]['nic']    = $row['nic'];
    $policies[$i]['mobile'] = $row['mobile'];
    $policies[$i]['fixed'] = $row['fixed'];
    $policies[$i]['email'] = $row['email'];
    $i++;
  }

  echo json_encode($policies);
}
else
{
  http_response_code(404);
}