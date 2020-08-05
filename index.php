<style>
  #container {
  height: 400px;
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

#sliders td input[type=range] {
  display: inline;
}
#sliders td {
  padding-right: 1em;
  white-space: nowrap;
}
</style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<?php 
include 'connection.php';
include_once 'graphMaker.php';
//$dir = "data/graph1.json";
$sql="SELECT COUNT(user_name) as unique_logins, COUNT(application) as number_access, application as application_name, "
        . "SUM(TIME_TO_SEC(`Total_system_hours`))/60 as Total_system_hours from monitored_info "
        . "WHERE clusters_cluster_id = '8' group by application";
$query=  mysqli_query($dbconfig,$sql);
$file_contents[]= mysqli_fetch_array($query);

//$file_contents = file_get_contents($dir);
print_r($file_contents);
$graph1_data =($file_contents);

$chart_name = "Total number of unique logins, Application access and Hours of app used per Month";
$chart_id = 'graph1Chart';
$x_axis_column = "applications";

createChartArea($chart_id);
$chart_data = prepareChartData($graph1_data,$x_axis_column);
drawColumnChart($chart_data['series_data'], $chart_data['x_axis_data'], $chart_name, $chart_id, $subtitle = '');


$dir = "data/graph2.json";
$file_contents = file_get_contents($dir);
$graph2_data = json_decode($file_contents,true);

$chart_name = "Total number of unique logins, Application access and Hours of app used per Week";
$chart_id = 'graph2Chart';
$x_axis_column = "applications";

createChartArea($chart_id);
$chart_data = prepareChartData($graph2_data,$x_axis_column);
drawColumnChart($chart_data['series_data'], $chart_data['x_axis_data'], $chart_name, $chart_id, $subtitle = '');


$dir = "data/graph3.json";
$file_contents = file_get_contents($dir);
$graph3_data = json_decode($file_contents,true);

$chart_name = "Total number of unique logins, Application access and Hours of app used per Week";
$chart_id = 'graph3Chart';
$x_axis_column = "User name";

createChartArea($chart_id);
$chart_data = prepareChartData($graph3_data,$x_axis_column);
drawColumnChart($chart_data['series_data'], $chart_data['x_axis_data'], $chart_name, $chart_id, $subtitle = '');
?>;