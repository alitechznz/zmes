<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 400px;
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

/**
 * Source data
 */
var data = [{
  "category": "Critical",
  "value": 89,
  "color": am4core.color("#dc4534"),
  "breakdown": [{
    "category": "Sales inquiries",
    "value": 29
  }, {
    "category": "Support requests",
    "value": 40
  }, {
    "category": "Bug reports",
    "value": 11
  }, {
    "category": "Other",
    "value": 9
  }]
}, {
  "category": "Acceptable",
  "value": 71,
  "color": am4core.color("#d7a700"),
  "breakdown": [{
    "category": "Sales inquiries",
    "value": 22
  }, {
    "category": "Support requests",
    "value": 30
  }, {
    "category": "Bug reports",
    "value": 11
  }, {
    "category": "Other",
    "value": 10
  }]
}, {
  "category": "Good",
  "value": 120,
  "color": am4core.color("#68ad5c"),
  "breakdown": [{
    "category": "Sales inquiries",
    "value": 60
  }, {
    "category": "Support requests",
    "value": 35
  }, {
    "category": "Bug reports",
    "value": 15
  }, {
    "category": "Other",
    "value": 10
  }]
}]

/**
 * Chart container
 */

// Create chart instance
var chart = am4core.create("chartdiv", am4core.Container);
chart.width = am4core.percent(100);
chart.height = am4core.percent(100);
chart.layout = "horizontal";


/**
 * Column chart
 */

// Create chart instance
var columnChart = chart.createChild(am4charts.XYChart);

// Create axes
var categoryAxis = columnChart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.inversed = true;

var valueAxis = columnChart.xAxes.push(new am4charts.ValueAxis());

// Create series
var columnSeries = columnChart.series.push(new am4charts.ColumnSeries());
columnSeries.dataFields.valueX = "value";
columnSeries.dataFields.categoryY = "category";
columnSeries.columns.template.strokeWidth = 0;

/**
 * Pie chart
 */

// Create chart instance
var pieChart = chart.createChild(am4charts.PieChart);
pieChart.data = data;
pieChart.innerRadius = am4core.percent(50);

// Add and configure Series
var pieSeries = pieChart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "value";
pieSeries.dataFields.category = "category";
pieSeries.slices.template.propertyFields.fill = "color";
pieSeries.labels.template.disabled = true;

// Set up labels
var label1 = pieChart.seriesContainer.createChild(am4core.Label);
label1.text = "";
label1.horizontalCenter = "middle";
label1.fontSize = 35;
label1.fontWeight = 600;
label1.dy = -30;

var label2 = pieChart.seriesContainer.createChild(am4core.Label);
label2.text = "";
label2.horizontalCenter = "middle";
label2.fontSize = 12;
label2.dy = 20;

// Auto-select first slice on load
pieChart.events.on("ready", function(ev) {
  pieSeries.slices.getIndex(0).isActive = true;
});

// Set up toggling events
pieSeries.slices.template.events.on("toggled", function(ev) {
  if (ev.target.isActive) {
    
    // Untoggle other slices
    pieSeries.slices.each(function(slice) {
      if (slice != ev.target) {
        slice.isActive = false;
      }
    });
    
    // Update column chart
    columnSeries.appeared = false;
    columnChart.data = ev.target.dataItem.dataContext.breakdown;
    columnSeries.fill = ev.target.fill;
    columnSeries.reinit();
    
    // Update labels
    label1.text = pieChart.numberFormatter.format(ev.target.dataItem.values.value.percent, "#.'%'");
    label1.fill = ev.target.fill;
    
    label2.text = ev.target.dataItem.category;
  }
});

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>