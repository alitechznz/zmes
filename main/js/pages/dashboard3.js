//[Dashboard Javascript]

//Project:	Power BI Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end



	// Create chart instance
	var chart = am4core.create("chart3", am4charts.RadarChart);

	// Add data
	chart.data = [{
	  "category": "Agenda 2063",
	  "value": 44,
	  "full": 100
	}, {
	  "category": "Agenda 2030 (SDGs)",
	  "value": 60,
	  "full": 100
	}, {
	  "category": "ZADEP (2021-2026)",
	  "value": 8,
	  "full": 100
	}];

	// Make chart not full circle
	chart.startAngle = -90;
	chart.endAngle = 180;
	chart.innerRadius = am4core.percent(20);

	// Set number format
	chart.numberFormatter.numberFormat = "#.#'%'";

	// Create axes
	var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
	categoryAxis.dataFields.category = "category";
	categoryAxis.renderer.grid.template.location = 0;
	categoryAxis.renderer.grid.template.strokeOpacity = 0;
	categoryAxis.renderer.labels.template.horizontalCenter = "right";
	categoryAxis.renderer.labels.template.fontWeight = 500;
	categoryAxis.renderer.labels.template.adapter.add("fill", function(fill, target) {
	  return (target.dataItem.index >= 0) ? chart.colors.getIndex(target.dataItem.index) : fill;
	});
	categoryAxis.renderer.minGridDistance = 10;

	var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
	valueAxis.renderer.grid.template.strokeOpacity = 0;
	valueAxis.min = 0;
	valueAxis.max = 100;
	valueAxis.strictMinMax = true;

	// Create series
	var series1 = chart.series.push(new am4charts.RadarColumnSeries());
	series1.dataFields.valueX = "full";
	series1.dataFields.categoryY = "category";
	series1.clustered = false;
	series1.columns.template.fill = new am4core.InterfaceColorSet().getFor("alternativeBackground");
	series1.columns.template.fillOpacity = 0.08;
	series1.columns.template.cornerRadiusTopLeft = 20;
	series1.columns.template.strokeWidth = 0;
	series1.columns.template.radarColumn.cornerRadius = 20;

	var series2 = chart.series.push(new am4charts.RadarColumnSeries());
	series2.dataFields.valueX = "value";
	series2.dataFields.categoryY = "category";
	series2.clustered = false;
	series2.columns.template.strokeWidth = 0;
	series2.columns.template.tooltipText = "{category}: [bold]{value}[/]";
	series2.columns.template.radarColumn.cornerRadius = 20;

	series2.columns.template.adapter.add("fill", function(fill, target) {
	  return chart.colors.getIndex(target.dataItem.index);
	});

	// Add cursor
	chart.cursor = new am4charts.RadarCursor();

	}); // end am4core.ready()
	

	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end

	var chart = am4core.create("chart6", am4charts.XYChart);

	chart.data = [{
	 "country": "OCGS",
	 "visits": 2025
	}, {
	 "country": "WEMA",
	 "visits": 1882
	}, {
	 "country": "ZFDA",
	 "visits": 1809
	}, {
	 "country": "ZPC",
	 "visits": 1122
	}, {
	 "country": "ZBS",
	 "visits": 984
	}, {
	 "country": "ZAECA",
	 "visits": 441
	}];

	chart.padding(40, 40, 40, 40);

	var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	categoryAxis.renderer.grid.template.location = 0;
	categoryAxis.dataFields.category = "country";
	categoryAxis.renderer.minGridDistance = 60;
	categoryAxis.renderer.inversed = true;
	categoryAxis.renderer.grid.template.disabled = true;

	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis.min = 0;
	valueAxis.extraMax = 0.1;
	//valueAxis.rangeChangeEasing = am4core.ease.linear;
	//valueAxis.rangeChangeDuration = 1500;

	var series = chart.series.push(new am4charts.ColumnSeries());
	series.dataFields.categoryX = "country";
	series.dataFields.valueY = "visits";
	series.tooltipText = "{valueY.value}"
	series.columns.template.strokeOpacity = 0;
	series.columns.template.column.cornerRadiusTopRight = 10;
	series.columns.template.column.cornerRadiusTopLeft = 10;
	//series.interpolationDuration = 1500;
	//series.interpolationEasing = am4core.ease.linear;
	var labelBullet = series.bullets.push(new am4charts.LabelBullet());
	labelBullet.label.verticalCenter = "bottom";
	labelBullet.label.dy = -10;
	labelBullet.label.text = "{values.valueY.workingValue.formatNumber('#.')}";

	chart.zoomOutButton.disabled = true;

	// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
	series.columns.template.adapter.add("fill", function (fill, target) {
	 return chart.colors.getIndex(target.dataItem.index);
	});

	setInterval(function () {
	 am4core.array.each(chart.data, function (item) {
	   item.visits += Math.round(Math.random() * 200 - 100);
	   item.visits = Math.abs(item.visits);
	 })
	 chart.invalidateRawData();
	}, 2000)

	categoryAxis.sortBySeries = series;

	}); // end am4core.ready()
	
}); // End of use strict
