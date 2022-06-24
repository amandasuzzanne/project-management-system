<?php
//using database connection file here
include('configuration.php'); 

//get id through query string
$id = $_GET['id']; 

// delete query
$deleted = mysqli_query($db, "DELETE FROM project WHERE project_id=".$id); 

if($deleted)
{
  //close connection
  $db->close(); 
  //redirects to projects page
  header("location:projects.php"); 
  echo "Deletion done successfully";
  exit;
} 
else 
{
  echo "Error while deleting record: " . $db->error;
  echo mysqli_connect_error();
}

$db->close();
?>