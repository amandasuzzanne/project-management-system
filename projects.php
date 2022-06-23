<?php
   include('configuration.php');
?>


<!DOCTYPE html>
<html>
<head>

<title>Projects</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
	body{background-color:#767c82;}
    .container{margin-top:3%;}
    button:hover {opacity: 0.8;}
</style>
</head>

<body>

<div class="container">

<h3>Projects</h3>

<table class="table table-dark table-striped table-hover table-bordered">
<tr> <th>Project Name</th> <th>Institution</th> <th>Implementation Date</th></tr>

<?php
	$str = '';
	$sql = "SELECT * FROM project ORDER BY implementation_date";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$str .= "<tr>
	<td>".$row['name']."</td>
	<td>".$row['institution']."</td>
	<td>".$row['implementation_date']."</td>
	<td>
    <a href='editProject.php?id=".$row['project_id']."'>Edit</a>
    <a href='addTask.php?id=".$row['project_id']."'>Add tasks</a>
	<a href='deleteProject.php?id=".$row['project_id']."'>Delete</a>
	</td></tr>";
	}
	echo $str;
?>

</table>
</div>

</body>
</html>