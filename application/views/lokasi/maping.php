  <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
<div class="row">
	<div class="col-md-12">
	<h5>map</h5>

	<div id="map"></div>
	</div>

	<div class="col-md-12">
		 <div class="x_panel">
                  <div class="x_title">
                    <h2>Stores Data <small>--/--</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                          </li>
                          <li>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div
                   </div>
                     <div class="x_content">
                     </div>
          </div>
</div>

</div>

   <script>
  function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-6.2421747,106.6243657),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          var map;
          var elevator;
          var myOptions = {
              zoom: 1,
              center: new google.maps.LatLng(0, 0),
             
          };
          map = new google.maps.Map($('#map')[0], myOptions);

          var addresses = ['57311'];

          for (var x = 0; x < addresses.length; x++) {
              $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+',indonesia'+'&sensor=false', null, function (data) {
                  var p = data.results[0].geometry.location
                  var latlng = new google.maps.LatLng(p.lat, p.lng);
                  new google.maps.Marker({
                      position: latlng,
                      map: map
                  });

              });
          } 

        }


      function doNothing() {}

    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcVE28gHPBbfQYXZ1F-J9ti1VetJpzI_U&callback=initMap">
    </script>

