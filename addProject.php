<?php
include('configuration.php'); //using database connection file here
    
    //save form data
    if (!empty($_POST['name']))
    {
        $name =  $_POST['name'];
        $institution =  $_POST['institution'];
        $implementation_date = $_POST['implementation_date'];
        
        
    $stmt = $db->prepare("INSERT INTO project (name, institution, implementation_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $inst, $impdate);

    //set parameters and execute
    $name = $name;
    $inst = $institution;
    $impdate = $implementation_date;
  
    if(!$stmt->execute()) 
        echo "<span style='color:white'>Error while adding project</span>";
    else
        $stmt->close();
        $db->close(); // Close connection
    
        echo "Project added successfully";
        header("location:projects.php"); // redirects to home page

    exit;
    }
?>


<!DOCTYPE html>
<html>
<head>
<title>New Project</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">

<style>
body{
    font-family: "Lato", sans-serif;
    background-color:#767c82;
    margin-left: 300px;
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
</head>

<body>
<h1>Add Project</h1>

<div class="sidenav">
    <a href="home.php">Dashboard</a>
    <a href="addProject.php">Add Project</a>
    <a href="#">Event Calendar</a>
    <a href="#">Project Reports</a>
    <a href="#">Project Visualization</a>
    <a href="#">Account</a>
    <a href="logout.php">Logout</a>
</div>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div class="row mb-4">
    <label for="inputName" class="col-sm-2 col-form-label">Project Name:</label>
    <div class="col-sm-3">
    <input type="name" id="inputName" placeholder="Project Name" name="name" class="form-control">
    </div>
</div>
<div class="row mb-4">
    <label for="inputInstitution" class="col-sm-2 col-form-label">Name of Institution:</label>
    <div class="col-sm-3">
    <input type="institution" id="inputInstitution" placeholder="Name of Institution" name="institution" class="form-control">
    </div>
</div>
<div class="row mb-4">
    <label for="inputImplementationDate" class="col-sm-2 col-form-label">Implementation Date:</label>
    <div class="col-sm-3">
    <input type="date" id="inputImplementationDate" placeholder="Implementation Date" name="implementation_date" class="form-control" >
    </div>
</div>
    <button id="save_btn" type="save" class="btn btn-dark col-sm-1" name="save">Save</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>
</html>
    
    