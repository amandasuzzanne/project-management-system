<?php
    //using database connection file here
    include('configuration.php'); 

    // project tasks
    $query = mysqli_query($db, 'select * from project_task');
    while ($row = mysqli_fetch_array($query)) $project_tasks[] = $row;
    // extract values into an array
    $project_tasks_values = array_map(function ($v) {
        $a = array_intersect_key($v, array_flip(['id', 'name', 'start_date', 'end_date', 'assigned']));
        return array_values($a);
    }, $project_tasks);
?>

<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // parse php variable
            let tasksValues = <?php echo json_encode($project_tasks_values) ?>;

            // google ganttchart
            google.charts.load('current', {'packages':['gantt']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Task ID');
                data.addColumn('string', 'Task Name');
                data.addColumn('string', 'Resource');
                data.addColumn('date', 'Start Date');
                data.addColumn('date', 'End Date');
                data.addColumn('number', 'Duration');
                data.addColumn('number', '% Complete');
                data.addColumn('string', 'Dependencies');

                data.addRows(tasksValues.map(v => {
                    let a = [...v];
                    a[2] = v[1];
                    a[3] = new Date(v[2]);
                    a[4] = new Date(v[3]);
                    a[5] = Number(a[4]);
                    a[6] = 0;
                    a[7] = '';
                    return a;
                }));

                var options = {
                    height: 400,
                    gantt: {
                        trackHeight: 30
                    }
                }

                var chart = new google.visualization.Gantt(document.getElementById('chart'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="chart" style="border: 1px solid #ccc"></div>
    </body>
</html>