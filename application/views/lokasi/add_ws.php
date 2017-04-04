
<style type="text/css">
	#map {
  height: 400px;
  width: 100%;

}

	
.controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }
      .title {
        font-weight: bold;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline;
      }
</style>


<div class="row">

<div class="col-md-6">
	<div class="x_title">
                    <h2>New White Spot</h2>
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
                
                   </div>


                     <div class="x_content">
                     	<form action="javascript:void(0)" class="insertws form-horizontal form-label-left" id="form-upload" enctype="multipart/form-data">
                     	<div class="form-group">
                     	<label class="control-label col-md-3 col-sm-3 col-xs-12">Store</label>
                     	 <div class="col-md-9 col-sm-9 col-xs-12">
		                     	<select name="filter_store" id="filter_store" class="form-control">
		                            <?php foreach($store_lokasi as $result) {?> 
		                            <?php if ($result->str_cd == $storex) {

		                                $selected='selected=""';
		                            } else {


		                                $selected='';
		                            }
		                        ?>

		                             <option <?php echo $selected?> value="<?php echo $result->str_cd  ?>" > <?php echo $result->str_nm  ?></option> 
		                        <?php } ?>
		                        </select>
                        </div>

                     	</div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">White Spot</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <input type="text" class="form-control" name="ws_name" id="ws_name" placeholder="Nama White spot" required>
	                        </div>
	                      </div>

	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kartu</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <input type="text" class="form-control"  name="no_card" id="no_card" placeholder="Cust no" required> 
	                        </div>
	                      </div>

	                      <div class="form-group">
	                      	 <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto White spot" required>
	                        </div>
	                      </div>


	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Daerah</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <input type="text" class="form-control"  name="daerah" id="daerah" placeholder="Daerah" required> 
	                        </div>
	                      </div>
	                       <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label> <span class="required">*</span>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <input type="text" class="form-control"  name="alamat" id="alamat" placeholder="Alamat" required>
	                          
	                        </div>
	                      </div>
	                      <div class="form-group">
	                      <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
	                      		<div class="col-md-6 col-sm-6 col-xs-12">
	                           		<input type="text" class="form-control"  name="latitute" id="latitute" placeholder="latitude" readonly required>
	                        	</div>
	                        	
	                        </div>
	                            <div class="form-group">
	                      	<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
	                      		
	                        	<div class="col-md-6 col-sm-6 col-xs-12">
	                           		<input type="text" class="form-control"  name="longitude" id="longitude" placeholder="longitude" readonly required>
	                        	</div>
	                        </div>
	                       <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Potensi Sales</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <input type="number" class="form-control"  name="potensi_sales" id="potensi_sales" placeholder="10000000">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bauran Produk <span class="required">*</span>
	                        </label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <textarea class="form-control" rows="3" name="bauran_prod" id="bauran_prod" placeholder='Bauran product'></textarea>
                       		 </div>
                     	 </div>
                     	   <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Remarks <span class="required">*</span>
	                        </label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          <textarea class="form-control" rows="3" name="remakrs" id="remakrs" placeholder='Catatan / Keterangan'></textarea>
                       		 </div>
                     	 </div>

                      	 <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo site_url('geolocation/white_spot')?>" type="button" class="btn btn-primary">Cancel</a>
                          <button  type="submit" class="btn btn-success btn-pass" id="btnsave">Submit</button>
                        </div>
              </div>  

	                      </form>
                     </div>

     
</div>

<div class="col-md-6">
	
	<div class="row">	   
	<input id="pac-input" class="form-control controls" type="text"
	        placeholder="Enter a location">
	    <div id="map"></div>
	    <div id="infowindow-content">
	      <span id="place-name"  class="title"></span><br>
	      Place ID <span id="place-id"></span><br>
	      <span id="place-address"></span>
	    </div>
	    <br/>
	    <p>Search lokasi dan <strong>klik marker</strong> untuk mendapatkan koordinat daerah.</p>

	</div>	    
</div>

</div>

<script type="text/javascript">
 var inputFile = $('input[name=foto]');

$('form.insertws').on('submit', function () {

	alert('hei');
	
	
	var fileToUpload = inputFile[0].files[0];
    console.log(fileToUpload);

     if(fileToUpload != 'undefined') {

     var formData = new FormData($(this)[0]);;
     formData.append("file",fileToUpload);

	$.ajax({ 

			url :"<?php echo  base_url()?>/geolocation/insert_ws/",
            type: 'POST',
            data : formData,
         	processData : false,
          	contentType:false,
            cache:false,
            beforeSend: function(){
	          	$('#btnsave').text('Saving..');
				$('#btnsave').attr('disabled',true);

	          },
            success: function(json){
            	var obj = jQuery.parseJSON(json);
                var message = obj['STATUS'];

                try {

                	 if(message=='true') {

                	 	  PNotify.prototype.options.styling = "bootstrap3";
                          new PNotify({

                          title: 'Success',
                          text: 'Successfully Insert New White Spot.',
                          type: 'success',
                          stack: {"dir1":"down", "dir2":"right", "push":"top"},
                          }); 

                          $('#btnsave').text('Submit');
						  $('#btnsave').attr('disabled',false);

                	 }

                	  if(message=='false') {

                	 	  PNotify.prototype.options.styling = "bootstrap3";
                          new PNotify({

                          title: 'Error',
                          text: obj['msg'],
                          type: 'error',
                          stack: {"dir1":"down", "dir2":"right", "push":"top"},
                          }); 

                          $('#btnsave').text('Submit');
						  $('#btnsave').attr('disabled',false);

                	 }



                }catch(e) {  
                          PNotify.prototype.options.styling = "bootstrap3";
                            new PNotify({

                            title: 'Error',
                            text: 'Failed Insert data.',
                            type: 'error',
                            stack: {"dir1":"down", "dir2":"right", "push":"top"},
                            });       
                          
                            $('#btnUpdate').text('Submit');
                            $('#btnUpdate').attr('disabled',false); //set button enable 
                            

                              } 

            },
             error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Exeption while request..');
                    return false;
                }


	});

	}

	return false;


});	

</script>

<script type="text/javascript">
	function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map
          
        });
        
        
        
        

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location

          });


          marker.addListener('click', function() {
          infowindow.open(map, marker);
         // alert(place.geometry.location.lat());
           $('#daerah').val(place.name);
           $('#alamat').val(place.formatted_address);
           $('#latitute').val(place.geometry.location.lat());
           $('#longitude').val(place.geometry.location.lng());
          
        });
          marker.setVisible(true);

          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-id'].textContent = place.place_id;
          infowindowContent.children['place-address'].textContent =
              place.formatted_address;
          infowindow.open(map, marker);
        });

}

</script>

 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcVE28gHPBbfQYXZ1F-J9ti1VetJpzI_U&libraries=places&callback=initMap">
    </script>
