<?php  
// Using database connection file here
include('configuration.php'); 

$query = mysqli_query($db, "SELECT name, implementation_date FROM project"); 
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) $events[] = $row;

echo json_encode($events);  

?>  