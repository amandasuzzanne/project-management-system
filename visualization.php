<?php
    //using database connection file here
    include('configuration.php'); 

    // project tasks
    //$query = ("SELECT COUNT(status) as total, status FROM project where status = 'completed','current'");
    //$query = ("SELECT status, COUNT(status) as total FROM project where status = 'current'");
    $query = ("SELECT status, COUNT(status) as total FROM project order by status");

    $res = mysqli_query($db, $query);
    $status = array();

    while ($result = mysqli_fetch_assoc($res)) {
        $status[]="['".$result['status']."',".$result['total']."],";
        
    }

?>

<html>
  <head>
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
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
        

        // google ganttchart
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
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
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>