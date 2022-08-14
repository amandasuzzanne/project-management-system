<?php
include('configuration.php');

// query count category groups 
$query1 = mysqli_query($db, "SELECT COUNT(*) as current FROM project GROUP BY status HAVING status = 'current'");
$query2 = mysqli_query($db, "SELECT COUNT(*) as completed FROM project GROUP BY status HAVING status = 'completed'");
$query3 = mysqli_query($db, "SELECT COUNT(*) as suspended FROM project GROUP BY status HAVING status = 'suspended'");

// fetch result arrays (category, count)
$current_count = mysqli_fetch_assoc($query1);
$completed_count = mysqli_fetch_assoc($query2);
$suspended_count = mysqli_fetch_assoc($query3);

// combine fetched categories into a collection
$status_count = [];
foreach ([$current_count, $completed_count, $suspended_count] as $count) {
  foreach ($count as $key => $value) {
    $status_count[] = [$key, $value/100];
  }
}

?>

<html>

<head>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // google piechart
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    // parse php array into javascript array
    let statusCount = <?php echo json_encode($status_count) ?>;

    function drawChart() {
      let data = google.visualization.arrayToDataTable([
        ['Task', 'Status'],
        // unpack values using spread operator
        ...statusCount
      ]);

      let options = {
        title: 'Tasks',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data, options);
    }
</script>

</html>