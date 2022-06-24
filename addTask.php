<?php
include('configuration.php'); //using database connection file here

$id = $_GET['id']; //get id through query string

    //save form data
    if (!empty($_POST['name']))
    {
        $name =  $_POST['name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        
    $stmt = $db->prepare("INSERT INTO task (name, start_date, end_date) VALUES (?, ?, ?) WHERE project_id=".$id);
    $stmt->bind_param("sss", $name, $sdate, $edate);

    //set parameters and execute
    $name = $name;
    $sdate = $start_date;
    $edate = $end_date;
    
    if(!$stmt->execute()) 
        echo "<span style='color:red'>Error while adding task</span>";
    else
        $stmt->close();
        $db->close(); // Close connection
        
        header("location:addTask.php"); // redirects to add tasks page
        echo "Task added successfully";
    exit;
    }
?>


<!DOCTYPE html>
<html>
<head>
<title>New Task</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
<h3>Add a new task</h3>

<style>
body{
    background-color:#767c82;
}

.container{
    margin-top:3%;
}
    
button, a:hover{
    opacity: 0.8;
}

a{
    display: inline-block;
    padding: 8px 16px;
}
</style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div class="row mb-4">
    <label for="inputName" class="col-sm-2 col-form-label">Task Name:</label>
    <div class="col-sm-3">
    <input type="name" id="inputName" placeholder="Task Name" name="name" class="form-control">
    </div>
</div>
<div class="row mb-4">
    <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date:</label>
    <div class="col-sm-3">
    <input type="date" id="inputStartDate" placeholder="Start Date" name="start_date" class="form-control" >
    </div>
</div>
<div class="row mb-4">
    <label for="inputEndDate" class="col-sm-2 col-form-label">End Date:</label>
    <div class="col-sm-3">
    <input type="date" id="inputEndDate" placeholder="Date" name="end_date" class="form-control" >
    </div>
</div>
    <a href="addProject.php" class="btn btn-dark col-sm-1">Back</a>
    <button id="save_btn" type="save" class="btn btn-dark col-sm-1" name="save">Save</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<div class="container">

<h3>Tasks</h3>

<table class="table table-dark table-striped table-hover">
<tr> <th>Task</th> <th>Start Date</th> <th>End Date</th> <th></th> <th></th> </tr>

<?php
    $id = $_GET['id']; //get id through query string
	$str = '';
	$sql = "SELECT * FROM task WHERE project_id=".$id;
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$str .= "<tr>
	<td>".$row['name']."</td>
	<td>".$row['start_date']."</td>
	<td>".$row['end_date']."</td>
	<td> <a href='editProject.php?id=".$row['project_id']."'>Edit</a> </td>
	<td> <a href='deleteProject.php?id=".$row['project_id']."'>Delete</a> </td>
    </tr>";
	}
	echo $str;
?>

</table>
</div>

</body>
</html> 