<?php

require 'database.php';

// Extract, validate and sanitize the id.
$indexnumber = ($_GET['indexnumber'] !== null && (int)$_GET['indexnumber'] > 0)? mysqli_real_escape_string($con, (int)$_GET['indexnumber']) : false;

if(!$indexnumber)
{
  return http_response_code(400);
}

// Delete.
//$sql = "DELETE FROM `policies` WHERE `id` ='{$id}' LIMIT 1";
$sql="DELETE FROM `students` WHERE `indexno`='{$indexno} LIMIT 1'";


if(mysqli_query($con, $sql))
{
  http_response_code(204);
}
else
{
  return http_response_code(422);
}