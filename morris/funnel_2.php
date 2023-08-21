<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.SlicedChart);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

chart.data = [{
    "name": "The first",
    "value": 600
}, {
    "name": "The second",
    "value": 300
}, {
    "name": "The third",
    "value": 200
}, {
    "name": "The fourth",
    "value": 180
}, {
    "name": "The fifth",
    "value": 50
}, {
    "name": "The sixth",
    "value": 20
}, {
    "name": "The seventh",
    "value": 10
}];

var series = chart.series.push(new am4charts.FunnelSeries());
series.colors.step = 2;
series.dataFields.value = "value";
series.dataFields.category = "name";
series.alignLabels = true;
series.orientation = "horizontal";
series.bottomRatio = 1;

chart.legend = new am4charts.Legend();
chart.legend.position = "top";

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>