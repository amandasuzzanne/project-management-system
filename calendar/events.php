<?php  
// Using database connection file here
include('configuration.php'); 

$events = array();
$query = mysqli_query($db, 'SELECT name, implementation_date FROM project'); 
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $events[] = array(
        'title' => $row['name'], 
        'start' => $row['implementation_date'],
        'end' => $row['implementation_date'],
    );
}

echo json_encode($events);
