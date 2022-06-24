<?php
include('configuration.php'); //using database connection file here

$id = $_GET['id']; //get id through query string

$deleted = mysqli_query($db, "DELETE FROM task WHERE task_id=".$id); // delete query

if($deleted)
{
  $db->close(); //close connection
  header("location:addTasks.php"); //redirects to projects page
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