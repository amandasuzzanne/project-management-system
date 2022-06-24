<?php
include('configuration.php'); // Using database connection file here

$id = $_GET['id']; // get id through query string

$query = mysqli_query($db,"SELECT * FROM task WHERE task_id = ".$id); // select query

$data = mysqli_fetch_array($query); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
	
    $edit = mysqli_query($db,"UPDATE task SET name='$name', start_date='$start_date', end_date='$end_date' where project_id='$id'");
	
    if($edit)
    {
      $db->close(); // Close connection
        header("location:addProject.php"); // redirects to all projects page
        exit;
    }
    else
    {
        echo mysqli_connect_error();
    }    
    
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
<h3>Update Project</h3>

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
    background-color: #212529;
}
</style>

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html> 

<form method="POST">
<div class="row mb-4">
   <label for="inputName" class="col-sm-2 col-form-label">Task:</label>
   <div class="col-sm-3">
   <input type="text" class="form-control"  name="name" value="<?php echo $data['name'] ?>" placeholder="Task">
   </div>
</div>
<div class="row mb-4">
   <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date:</label>
   <div class="col-sm-3">
   <input type="date" class="form-control" name="start_date" value="<?php echo $data['start_date'] ?>" placeholder="Start Date">
   </div>
</div>
<div class="row mb-4">
   <label for="inputEndDate" class="col-sm-2 col-form-label">End Date:</label>
   <div class="col-sm-3">
   <input type="date" class="form-control" name="end_date" value="<?php echo $data['end_date'] ?>" placeholder="End Date">
   </div>
</div>
<a href="addTask.php" class="btn btn-dark col-sm-1">Back</a>
<button type="submit" class="btn btn-dark col-sm-1" name="update">Update</button>
</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
