  <style>
      #map {
        width: 100%;
        height: 200px;
        background-color: grey;
      }
    </style>

<div class="x_panel">
                  <div class="x_title">
                    <h2>Detail White Spot <small> <?php echo $detail->nama_toko ?> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                       <li><a class="close-link" data-dismiss="modal"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    	<div class="col-md-12">
                    	
                   		</div>

                   		<div>
                   				<div id="map"></div>
                   		</div>

                   		<div class="row">
                   		 <img style="width: 50%; height:50%; padding-top:10px;padding-left:10px;float:left;" src="<?php echo base_url()."arsip/".$detail->foto; ?>" alt="image" />
                   		<p></p>

                   		<div class="">
                   		<table class="table table-hover col-md-4" caption"Hello">
                   		 <tr><td>Nama toko</td><td>:</td><td> <?php echo $detail->nama_toko ?></td></tr>
                   		 <tr><td>Daerah</td><td>:</td><td> <?php echo $detail->daerah ?></td></tr>	
                   		 <tr><td>Alamat</td><td>:</td><td> <?php echo $detail->alamat ?></td></tr>		
                   		 <tr><td>Potensi Sales </td><td>:</td><td> <?php echo number_format($detail->potensi_sales,2,',',',')?></td></tr>		
                   		 <tr><td>Bauran Product</td><td>:</td><td> <?php echo $detail->bauran_product ?></td></tr>		
                   		<tr><td>Remarks</td><td>:</td><td> <?php echo $detail->catatan ?></td></tr>	
                   		
                   		</div>
                   		</table>
                    <form class="form-horizontal form-label-left">

                      
                  </form>
                </div>


       <script>
      function initMap() {
        var uluru = {lat: <?php echo $detail->latitute ?>, lng: <?php echo $detail->longitude ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>

     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcVE28gHPBbfQYXZ1F-J9ti1VetJpzI_U&callback=initMap">
    </script>
