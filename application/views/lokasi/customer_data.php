<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map_canvas {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map_canvas #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
    </style>

<head><?php echo $map['js']; ?></head>    
       
<div class="row">
	<div class="col-md-12">

    
	<?php  echo $map['html']; ?>
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
                     <div class="form-group">
                     
                     <div class="form-group">
                           
                            <input type="text" name="autotext" id="autotext"  class="form-control">
                             
                          </div>





                     </div>


                     <form action="<?php echo site_url('geolocation/get_data_map')?>" method="POST" class="form-horizontal store" id="formfilter">
                     	  <div class="form-group"><?php echo $form_store; ?></div> 
                     	 <div class="form-group"> 
                     	 <button type="submit" class="btn btn-primary pull-right" id="btn-filter">Filter</button>
                     	 </div>
                     </form>
                     </div>
          </div>
	</div>
</div>        



<!-- 
<script>
var str_cd = $('#filter_store').val();
var form = $('#formfilter');

$('#formfilter').on('submit', function () {
$('#btn-filter').text('Searching...');
$('#btn-filter').attr('disabled',true);
	 $.ajax({
	 	url: "<?php echo  base_url()?>/geolocation/get_data_map",
	 	data: form.serialize(),
	 	type: "POST",
        cache: false,
        beforeSend: function(){

         $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
     
         },
        success: function(data) {
        	$('#btn-filter').text('Filter');
			$('#btn-filter').attr('disable',false);
			$('#demo2').fadeOut('fast');

			$('#petaku').html(data);
         },

        error: function(){      
          alert('Error while request..');
           return false;
         },
	 });





});
</script> -->

