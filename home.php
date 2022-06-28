<?php
   include('configuration.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
body {
  font-family: "Lato", sans-serif;
  background-color:#767c82;
  margin-left: 300px;
}

.sidenav {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.container{
  margin-top:3%;
}

.main {
 
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
    <a href="home.php">Dashboard</a>
    <a href="addProject.php">Add Project</a>
    <a href="#">Event Calendar</a>
    <a href="#">Project Reports</a>
    <a href="#">Project Visualization</a>
    <a href="#">Account</a>
    <a href="logout.php">Logout</a>
</div>
<div class="container">
<div class="main">
  <h1>Dashboard</h1>
</div>


<h5>Current Projects</h5>

<table class="table table-dark table-hover ">
<tr> <th>Project Name</th> <th>Implementation Date</th></tr>

<?php
	$str = '';
	$sql = "SELECT * FROM project WHERE status='current' ORDER BY implementation_date";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$str .= "<tr>
	<td>".$row['name']."</td>
	<td>".$row['implementation_date']."</td>
	</tr>";
	}
	echo $str;
?>

</table>
</div>
   
</body>
</html> 

