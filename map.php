<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
  
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
   
<script type="text/javascript" src="dist/leaflet.ajax.min.js"></script>
	<style>

 #mapid { height: 530px;
          width:567px; }
.b:hover {
  text-shadow: 0 0 10px rgba(255,255,255,1) , 0 0 20px rgba(255,255,255,1) , 0 0 30px rgba(255,255,255,1) , 0 0 40px #00ffff , 0 0 70px #00ffff , 0 0 80px #00ffff , 0 0 100px #00ffff ;
}
a{
	color:white;
}

.marker-pin {
  width: 30px;
  height: 30px;
  border-radius: 50% 50% 50% 0;
  background: #c30b82;
  position: absolute;
  transform: rotate(-45deg);
  left: 50%;
  top: 50%;
  margin: -15px 0 0 -15px;
}

.marker-pin::after {
    content: '';
    width: 24px;
    height: 24px;
    margin: 3px 0 0 3px;
    background: #fff;
    position: absolute;
    border-radius: 50%;
 }


.custom-div-icon i {
   position: absolute;
   width: 22px;
   font-size: 22px;
   left: 0;
   right: 0;
   margin: 10px auto;
   text-align: center;
}

.custom-div-icon i.awesome {
    margin: 12px auto;
    font-size: 17px;
 }
</style>
 
</head>
<body>
    <!-- MENU SECTION END-->
      <div class="col-md-12">
				 
    <div id="mapid" style="width: 100%; height: 530px; border: 1px solid #ccc"></div>
<script src="dist/leaflet.groupedlayercontrol.min.js"></script>
<script src="dist/leaflet.groupedlayercontrol.min.js.map"></script>
<script src="dist/leaflet-routing-machine.js"></script>
<script src="dist/leaflet.shpfile.js"></script>
<script src="dist/shp.js"></script>

<script src="dist/shp.min.js"> </script>
	<script>

  //-6.1655/39.2033
	var mymap = L.map('mapid').setView([-6.1655,39.2033],8);
	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?access_token={accessToken}', {
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	maxZoom: 20,
	id: 'mapbox.streets',
  accessToken: 'pk.eyJ1IjoiYmluYm9uaXkiLCJhIjoiY2swa2VhdDB0MGl5OTNsbGlnMWduMmd0ZiJ9.XajWTPyAcPtxvcxIVZmg3Q',
}).addTo(mymap);

 
  
  // add a scale at at your map.
  var scale = L.control.scale().addTo(mymap); 

// Get the label.
var metres = scale._getRoundNum(mymap.containerPointToLatLng([0, mymap.getSize().y / 2 ]).distanceTo( mymap.containerPointToLatLng([scale.options.maxWidth,mymap.getSize().y / 2 ])))
  label = metres < 1000 ? metres + ' m' : (metres / 1000) + ' km';

  console.log(label);
  
     

  //////////////////////////////
  
  
  
  var osm = L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"),
  
  googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3']}),
 
  
  
    mqi = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3']});

var baseMaps = {
    "OpenStreetMap": osm,
    "GoogleStreets": mqi,
	"Google view": googleStreets
	
		
};

var overlays =  {//add any overlays here



    };

L.control.layers(baseMaps,overlays, {position: 'topright'}).addTo(mymap);
  
  
  
  
  

  var north = L.control({position: "bottomleft"});
north.onAdd = function(mymap) {
    var div = L.DomUtil.create("div");
    div.innerHTML = '<img style="width:20%;margin-left:10%;"src="dist/north5.png">';
    return div;
}
north.addTo(mymap);



function popUp(f,l){
    var out = [];
    if (f.properties){
        for(key in f.properties){
            out.push(key+": "+f.properties[key]);
        }
        l.bindPopup(out.join("<br />"));
    }
}
var jsonTest = new L.GeoJSON.AJAX(["dist/zanzibar_ward.geojson","dist/zanzibar_ward.geojson"],{onEachFeature:popUp}).addTo(mymap);


var icon = L.divIcon({
       
       iconSize: [30, 42],
       iconAnchor: [15, 42] // half of width + height
   });

icon = L.divIcon({
       className: 'custom-div-icon',
       html: "<div style='background-color:#00004d;' class='marker-pin'></div><i class='fa fa-home awesome'>",
       iconSize: [30, 42],
       iconAnchor: [15, 42]
   });

   icon1 = L.divIcon({
       className: 'custom-div-icon',
       html: "<div style='background-color:#ffffff;' class='marker-pin'></div><i class='fa fa-home awesome'>",
       iconSize: [30, 42],
       iconAnchor: [15, 42]
   });

 // mymap.locate();

  function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(mymap)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(mymap);
}

mymap.on('locationfound', onLocationFound);

function onLocationError(e) {
    alert(e.message);
}

mymap.on('locationerror', onLocationError);


</script>

<script> 
 

    var marker = L.marker([-6.1789725,39.2054938],  {icon: icon}).addTo(mymap)
  .bindPopup('Ofisi ya ZPC  .<br> VUGA  .<br> ZANZIBAR '
  )
    .openPopup();


    
	</script> 

    </div>
                </div>

           
   
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>



</body>
</html>