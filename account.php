<?php
   include('configuration.php');

   //Session to manage
   session_start();

   //Ensure the user is logged in
   if (empty($_SESSION['login_user'])) header("location:login.php");
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select email from users where email = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['email'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="sidenav">
    <a href="home.php">Dashboard</a>
    <a href="addProject.php">Add Project</a>
    <a href="calendar/index.php">Event Calendar</a>
    <a href="projectReport.php">Project Reports</a>
    <a href="visualization.php">Project Visualization</a>
    <a href="account.php">Account</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
<div class="main">
  <h1>Account</h1>
</div>

<table class="table table-dark table-hover ">
<tr> <th>Name</th> <th>Email</th> <th>Rank</th></tr>

<?php
	$str = '';
	$sql = "SELECT CONCAT(first_name, ' ',last_name) as name,  email, emp_rank from users where email = '".$_SESSION['login_user']."'";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$str .= "<tr>
	<td>".$row['name']."</td>
	<td>".$row['email']."</td>
    <td>".$row['emp_rank']."</td>
	</tr>";
	}
	echo $str;
?>
</table>
</div>

</body>
</html>