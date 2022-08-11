<?php
    //using database connection file here
    include('configuration.php'); 

    // project tasks
    $query = ("SELECT status, id as total FROM project");

    $res = mysqli_query($db, $query);
    $status = array();

    while ($result = mysqli_fetch_assoc($res)) {
        $status[]="['".$result['status']."',".$result['total']."],";
        
    }

?>

<html>
  <head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    
        // google piechart
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Task', 'Status'],
                <?php
                foreach ($status as $status) {
                    echo $status;
                }
                ?>
            ]);

        var options = {
          title: 'Tasks',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>

  
<div class="container">
<link rel="stylesheet" href="style.css">

<div class="sidenav">
  <a href="home.php">Dashboard</a>
  <a href="addProject.php">Add Project</a>
  <a href="calendar/index.php">Event Calendar</a>
  <a href="projectReport.php">Project Reports</a>
  <a href="visualization.php">Project Visualization</a>
  <a href="account.php">Account</a>
  <a href="logout.php">Logout</a>
</div>
<div class="main">
  <h1>Project Visualization</h1>
</div>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>