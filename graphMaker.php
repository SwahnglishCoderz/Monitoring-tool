<?php
function createChartArea($chart_id){
  ?>
  <figure class="highcharts-figure">
  <div id="<?php echo $chart_id ?>"></div>
  <p class="highcharts-description">
    Chart designed to highlight 3D column chart rendering options.
    Move the sliders below to change the basic 3D settings for the chart.
    3D column charts are generally harder to read than 2D charts, but provide
    an interesting visual effect.
  </p>
</figure>
  <?php
}

function prepareChartData($chart_data,$x_axis_key) {
  $graph1_chart_data = [];
  $graph1_series_data = [];
  $x_axis_data = [];
  $x_axis_key = $x_axis_key;
  foreach ($chart_data as $key => $value) {
    foreach ($value as $name => $data) {
      if (array_key_exists($name, $graph1_chart_data)) {
        $graph1_chart_data[$name]['data'][] = $data;
      } else {
        $graph1_chart_data[$name] = [];
        $graph1_chart_data[$name]['data'] = [];
        $graph1_chart_data[$name]['data'][] = $data;
        $graph1_chart_data[$name]['name'] = $name;
      }
    }
  }
  $x_axis_data = $graph1_chart_data[$x_axis_key]['data'];
  unset($graph1_chart_data[$x_axis_key]);
  foreach ($graph1_chart_data as $key => $value) {
    $graph1_series_data[] = $value;
  }

  return ['x_axis_data' => $x_axis_data,'series_data' => $graph1_series_data];
}

function drawColumnChart($series_data, $x_axis_data, $chart_name, $chart_id, $subtitle = '') {
  ?>

<script type="text/javascript">

  // Set up the chart
var graph1_series_data = <?php echo json_encode($series_data); ?> ;
var x_axis_data = <?php echo json_encode($x_axis_data); ?> ;
var chart_name = "<?php echo $chart_name ?>";
var subtitle = "<?php echo $subtitle ?>";
var chart_id = "<?php echo $chart_id ?>";

var chart = new Highcharts.Chart({
  chart: {
    renderTo: chart_id,
    type: 'column',
    // options3d: {
    //   enabled: true,
    //   alpha: 20,
    //   beta: 0,
    //   depth: 50,
    //   viewDistance: 25
    // }
  },
  xAxis: {
        categories: x_axis_data,
        crosshair: true
    },
  title: {
    text: chart_name
  },
  subtitle: {
    text: subtitle
  },
  tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:11px;white-space:nowrap">{series.name}: </td>' +
            '<td style="padding:0; font-size:11px"><b>{point.y} </b></td></tr>',
            // '<td style="padding:0; font-size:11px"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
  plotOptions: {
    column: {
      depth: 25,
      pointPadding: 0.2,
    }
  },
  series: graph1_series_data
});

</script>

  <?php
}

function drawBarChart($series_data, $x_axis_data, $chart_name, $chart_id, $subtitle = '') {
  ?>

<script type="text/javascript">

  // Set up the chart
var graph1_series_data = <?php echo json_encode($series_data); ?> ;
var x_axis_data = <?php echo json_encode($x_axis_data); ?> ;
var chart_name = "<?php echo $chart_name ?>";
var subtitle = "<?php echo $subtitle ?>";
var chart_id = "<?php echo $chart_id ?>";

var chart = new Highcharts.Chart({
  chart: {
    renderTo: chart_id,
    type: 'bar',
    // options3d: {
    //   enabled: true,
    //   alpha: 20,
    //   beta: 0,
    //   depth: 50,
    //   viewDistance: 25
    // }
  },
  xAxis: {
        categories: x_axis_data,
        crosshair: true
    },
  title: {
    text: chart_name
  },
  subtitle: {
    text: subtitle
  },
  tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:11px;white-space:nowrap">{series.name}: </td>' +
            '<td style="padding:0; font-size:11px"><b>{point.y} </b></td></tr>',
            // '<td style="padding:0; font-size:11px"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
  plotOptions: {
    column: {
      depth: 25,
      pointPadding: 0.2,
    }
  },
  series: graph1_series_data
});

</script>

  <?php
}

?>
