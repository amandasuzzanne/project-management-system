<?php
include('configuration.php'); // Using database connection file here

$id = $_GET['id']; // get id through query string

$query = mysqli_query($db,"SELECT * FROM project WHERE project_id = ".$id); // select query

$data = mysqli_fetch_array($query); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $institution = $_POST['institution'];
    $implementation_date = $_POST['implementation_date'];
	
    $edit = mysqli_query($db,"UPDATE project SET name='$name', institution='$institution', implementation_date='$implementation_date' where project_id='$id'");
	
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
   <label for="inputName" class="col-sm-2 col-form-label">Project Name:</label>
   <div class="col-sm-3">
   <input type="text" class="form-control"  name="name" value="<?php echo $data['name'] ?>" placeholder="Enter Project Name">
   </div>
</div>
<div class="row mb-4">
   <label for="inputInstitution" class="col-sm-2 col-form-label">Name of Institution:</label>
   <div class="col-sm-3">
   <input type="text" class="form-control" name="institution" value="<?php echo $data['institution'] ?>" placeholder="Enter Name of Institution">
   </div>
</div>
<div class="row mb-4">
   <label for="inputImplementationDate" class="col-sm-2 col-form-label">Implementation Date:</label>
   <div class="col-sm-3">
   <input type="date" class="form-control" name="implementation_date" value="<?php echo $data['implementation_date'] ?>" placeholder="Enter Implementation Date">
   </div>
</div>
<a href="addProject.php" class="btn btn-dark col-sm-1">Back</a>
<button type="submit" class="btn btn-dark col-sm-1" name="update">Update</button>
</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
