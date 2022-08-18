<?php
// Using database connection file here
include('configuration.php'); 

// get id through query string
$id = $_GET['project_id']; 

// select query fetch data
$query = mysqli_query($db, "SELECT * FROM project WHERE id = ".$id); 

// when click on Add button
if(isset($_POST['add'])) 
{
    $comments= $_POST['comments'];
    $suggestions= $_POST['suggestions'];
    $ratings= $_POST['rating'];

    $stmt = $db->prepare('UPDATE project SET comments = ?, suggestions = ?,  ratings = ?, WHERE id = ?');
    $stmt->bind_param('ssss', $comments, $suggestions, $ratings, $id);
    $result = $stmt->execute();

    if(!$result) echo "<span style='color:red'>Error while adding report</span>";
    if (!mysqli_affected_rows($db)) echo "<span style='color:red'>Something went wrong! Could not add report</span>";
    else {
        // close connection and redirect
        $db->close(); 
        header("location:addReport.php"); 
        exit;
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
<title>Add Report</title>
</head>
<body>
<div class="container">
<h3>Add Report</h3>
<form method="POST">
<div class="row mb-4">
   <label for="inputComment" class="col-sm-2 col-form-label">Comment:</label>
   <div class="col-sm-3">
   <input type="comment" id="inputComment" name="comment" class="form-control">
   </div>
</div>
<div class="row mb-4">
   <label for="inputSuggestions" class="col-sm-2 col-form-label">Suggestions:</label>
   <div class="col-sm-3">
   <input type="suggestions" id="inputSuggestions" name="suggestions" class="form-control">
   </div>
</div>
<div class="row mb-4">
<label for="rating" class="col-sm-2 col-form-label">Project Rating:</label>
<div class="col-sm-3">
<select name="rating" class="form-control" >
    <option value="">-- Select Rating --</option>
        <?php
        // Rating array
        $position = array("low", "medium", "high", "excellent");
        
        // Iterating through the rating array
        foreach($position as $rating){
            echo '<option value="' . strtolower($rating) . '">' . $rating . '</option>';
        }
        ?>
   </select>
</div>
</div>
<a href="home.php" class="btn btn-dark col-sm-1">Back</a>
<a href="addReport.php" type="submit" class="btn btn-dark col-sm-1" name="add">Add</a>
</form>
</div>
</body>
</html>