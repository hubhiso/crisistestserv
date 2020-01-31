

  <div id="map"></div>

  <script>

  // initialize the map
  var map = L.map('map').setView([13.850041, 100.528843], 8);

  // load a tile layer
  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
      //attribution: 'Dev BY @kookzi Tanyarat kerdsuwan &nbsp;<a href="http://hiso.or.th">HISO</a>',
    }).addTo(map);


  $.getJSON("loadjson.php",function(data){
    var ratIcon = L.icon({
      iconUrl: 'm02.png',
      iconSize: [30,43]
    });
    var rodents = L.geoJson(data,{
      pointToLayer: function(feature,latlng){
        var marker = L.marker(latlng,{icon: ratIcon});
        marker.bindPopup('<b>'+feature.properties.name + '</b><br/>'+'โทร : '+feature.properties.tel + '<br/>'+'แฟกซ์ : '+feature.properties.fax + '<br/>' +'last_update : ' + feature.properties.last_update);
        return marker;
      }
    });
    var clusters = L.markerClusterGroup();
    clusters.addLayer(rodents);
    map.addLayer(clusters);
  });
  
  
  
  </script>

	