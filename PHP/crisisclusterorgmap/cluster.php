<?php 

$lang = $_GET['lang'];

if($lang == 'th'){
  $link = "loadjson.php";
  $name = "หน่วยงาน";
  $add = "ที่อยู่";
}else if($lang == 'en'){
  $link = "loadjson_en.php";
  $name = "Agency";
  $add = "Address";
}else{
  $link = "";
  $name = "";
  $add = "";
}

?>
<html>
<head>
  <title>Crisis cluster</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link rel="shortcut icon" href="favicon.png">
  <link rel="stylesheet" href="leaflet_cluster.css" />
  <link rel="stylesheet" href="MarkerCluster.css" />
  <link rel="stylesheet" href="leaflet.css"/>
  <script src="leaflet.js"></script>
  <link rel="stylesheet" href="MarkerCluster.css" />
  <!--script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script-->
  <script src="leaflet.markercluster.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <style>
    #map{ height: 100% }
  </style>
</head>
<body>

  <div id="map"></div>

  <script>

  // initialize the map
  var map = L.map('map').setView([13.850041, 100.528843], 6);

  // load a tile layer
  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
      //attribution: 'Dev BY @kookzi Tanyarat kerdsuwan &nbsp;<a href="http://hiso.or.th">HISO</a>',
    }).addTo(map);


  $.getJSON('<?php echo $link; ?>',function(data){
    var ratIcon = L.icon({
      iconUrl: 'crisispinx45.png',
      iconSize: [45,45]
    });
    var rodents = L.geoJson(data,{
      pointToLayer: function(feature,latlng){
        var marker = L.marker(latlng,{icon: ratIcon});
        marker.bindPopup('<b><?php echo $name; ?> : '+feature.id + '</b><br/>'+'<?php echo $add; ?> : '+feature.properties.receiver);
        return marker;
      }
    });
    var clusters = L.markerClusterGroup();
    clusters.addLayer(rodents);
    map.addLayer(clusters);
  });
  
  
  
  </script>
</body>
</html>
	