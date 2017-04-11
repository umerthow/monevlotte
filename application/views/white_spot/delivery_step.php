<div class="row">
<div class="x_panel">
<div class="x_content">
<form action="<?php echo site_url('white_spot/get_finish')?>" method="POST" id="form_identity_transc">
<!--  <div class="col-md-6">
 <div class="row">
 <div class="form-group col-md-6">
	<div class="form-group">
       <label for="kode">Cari Customer  </label>
      <input type="text" name="whitespot_no"  id="whitespot_no" class="form-control bs-callout-warning" value=""  placeholder="input cust no"  required="required" data-validate-length-range="4"/>
  	</div>
  </div>
   <div class="form-group col-md-3">
      <button id="pilihprodkat" type="button" class="btn btn-success" style="margin-top:23px;"><a href="#event_info">Cari</a></button>
    </div>
 </div>
 <hr/>
</div>
<div class="col-md-2">
</div> -->
<div class="col-md-12">
<div class="row">
				<div class="animated flipInY col-lg-6 col-md-6">
                        <div class="tile-stats">
                          <p>Total Transaction</p>	
                          <div class="count" style="font-size:20px">Rp. <?php echo number_format($total_transc,2,',',',') ?></div>
                          <input type="number" class="hidden" name="tot_trans" id="tot_trans" value="<?php echo $total_transc ?>" >
                         
                          <p>Please Complete The Form Below :</p>
                        </div>
                  </div>
 </div>
 </div>       


 <div class="col-md-6">
<label>Nama Customer</label>
<div class="input-group">
   <input type="text"  class="hidden" name="wsid" id="wsid" value="" >
    <input type="text" class="form-control" name="ws_name" id="ws_name" placeholder="Nama White spot" readonly="">
     <span class="input-group-btn">
           <button type="button" class="btn btn-info" id="load_whitespot">....</button> <span id = "demo2"></span>
       </span>
   </div>


 <div class="form-group">
	  <label>Customer Nomor</label>
	   <input type="text" class="form-control"  name="no_card" id="no_card" placeholder="Cust no" readonly> 
</div>
<div class="form-group">
<label>Alamat</label> <span class="required">*</span>
	                      
	 <input type="text" class="form-control"  name="alamat" id="alamat" placeholder="Alamat" readonly>
                        
</div>

<div class="form-group">
<label>Alamat Pengiriman</label> <span class="required">*</span>
	<div class="form-group">
		<input type="checkbox" onclick="handleClick();" id="sama_alamat"> Sama dengan Alamat Diatas
	</div>	  
<textarea class="form-control" rows="3" name="send_alamat" id="send_alamat" placeholder='Alamat pengiriman detail' required="" ></textarea>                     
	
                        
</div>

<div class="form-group">
<label>Telp</label> <span class="required">*</span>
 <input type="text" class="form-control" name="no_telp" id="no_telp" data-inputmask="'mask' : '(999) 999-9999'">
</div>

<div class="form-group">
<label>Email</label> <span class="required">*</span>
 <input type="email" class="form-control" name="email" id="email" data-inputmask="'mask' : '(999) 999-9999'">
</div>











<br/>
<br/>












  </div>

<div class="col-md-6">
<div class="form-group">
    <label>Choose Delivery Metode</label> <span class="required">*</span>
      <select id="delivery" name="delivery" class="form-control" required>
        <option value="free">Free Delivery</option>
        <option value="onsite">Charge Delivery</option>
        <option value="carry-in">Carry In</option>
                           
      </select>
</div>
<div class="form-group" id="form_distance" style="padding-bottom:10px;">
<div class="form-group">
	

	<div class="form-group col-md-6">
	<small>Jarak / kilo meter</small>
	<input type="number" name="distance" id="distance" class="form-control"   value="0" placeholder="input distance" > 
	</div>
	<div class="form-group col-md-3" >
	<small><strong>Amount :</strong></small>
			<h4><small>Rp.</small> <strong> <span id="result"></span></strong><small>,00</small></h4>
			<input type="number" class="hidden" name="result_info" id="result_info">	
	</div>

</div>
</div>

<div class="col-md-12">
<div class="row">
	<div class="form-group">
	 <label>Choose Payment Metode</label> <span class="required">*</span>
	  <select id="payment" name="payment" class="form-control" required>
	    <option value="1">Cash</option>
	    <option value="2">Via Transfer</option>
	    <option value="3">TOP (Ketentuan jangka waktu pembayaran )</option>
	    <option value="4">Credit Card</option>                                 
	  </select>

	</div>
</div>
</div>
<div class="col-md-5">
	<div class="form-group">
	<small>Durasi Pembayaran / bulan</small>
	<input type="number" class="form-control" name="top_duration" id="top_duration" value="0" readonly>
	</div>
</div>

<div class="col-md-6">
		<div class="form-group">
		<small>Credit Card Number</small>
		<input type="text" class="form-control" name="cc_number" id="cc_number" value="" placeholder="credit card number" readonly>
		</div>
</div>

</div>

<div class="col-md-12">
								<!-- <button type="submit" class="btn btn-primary pull-right next-payment"><span class="fa fa-arrow-circle-right"></span> CONTINUE CHEKOUT</button>
 -->
 <div class="form-group">
 <button type="submit" class="btn btn-primary pull-right"><span class="fa fa-file-text-o"></span> GET INVOICE</button>
 	<a href="<?php echo site_url('white_spot/transaction')?>" class="btn btn-info pull-right"><span class="fa fa-arrow-circle-left"></span> KEMBALI KE POS</a>
 	
 </div>
</div>

</form>
</div>
</div>
</div>



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="ws_option">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      		  <div class="modal-body">
      		  <h4>List White Spot</h4>

      		  <table class="table table-bordered nowrap table-hover" id="table1" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">

      		  <thead>
      		  	
      		  			 <th bgcolor="#FFFFFF"  class=" info text-center" >#</th>
      		  			  <th class="info text-center" >Noid</th>
                          <th class="info text-center" >Nama</th>
                          <th class="info text-center" >No Cust</th>
                          <th class="info text-center" >Daerah</th>
                          <th class="info text-center" >Alamat</th>	
                

      		  	 </thead>

      		  	 		<tbody>
                                                    
                         </tbody> 
      		  </table>
      		  </div>
      		   <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <!-- <button type="submit" class="btn btn-primary btn-process">Pilih</button> -->
        </div>
      </div>
</div>


<!-- <div class="col-md-12">
<a href="javascript:void(0)" class="btn btn-info pull-left next-invoice"><span class="fa fa-arrow-circle-right"></span> PREVIOUSE</a>
<a href="javascript:void(0)" class="btn btn-primary pull-right next-invoice"><span class="fa fa-arrow-circle-right"></span> NEXT</a>
</div> -->

<script type="text/javascript">
var table ;
  $(document).ready(function() {
  	table = $('#table1').DataTable({
  	 "serverSide": true, //Feature control DataTables' server-side processing mode.
	 "order": [], //Initial no order.
	 "oLanguage": {
	         "sProcessing": "<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> <b>Please Wait...</b>"
	       },
	 "processing": true, //Feature control the processing indicator.

	  "ajax": {
	            "url": "<?php echo site_url('white_spot/ajax_list_white_spot')?>",
	            "type": "POST",
	        
	            // "beforeSend":function(){
	            //    $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
	            //  },

	            "data":function (data){
	             
	            
	             
	            },

	        },

	    "columnDefs": [
        { 
            "targets": 1 , //last column
            "visible": false, //set not orderable
        },
        ],

	    });

  });
</script>

<script type="text/javascript">
$('#table1 tbody').on('dblclick', 'tr', function () {
var data = table.row( this ).data();
var id_cust = data[1];

//alert('hai '+id_cust);
	$.ajax({

	  url :"<?php echo  base_url()?>/white_spot/get_wo_detail/",
 	  data: {'noid': id_cust},
 	  type: 'GET',
 	  dataType: 'JSON',
 	  beforeSend: function(){
        $('#demo2').show();
        $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
      },

      success: function(data){
      			$('#wsid').val(data.noid);
                  $('#ws_name').val(data.nama_toko);
                  $('#no_card').val(data.no_card);
                  $('#alamat').val(data.alamat);
                 $('#ws_option').modal('hide');	
                  $('#demo2').html('<span class="fa fa-check-square-o"></span>');
      },
       error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
              $('#ws_option').modal('hide');
               return false;
          }


		});
});
</script>

<script>
function confirm(){

	alert('Print Invoice');
}
</script>


<script>
$('#load_whitespot').on('click', function () {

	$('#ws_option').modal('show');

});
</script>


<script type="text/javascript">

function handleClick(){
var alamat = $('#alamat').val();

	$('#send_alamat').val(alamat);
}
		
</script>

<script type="text/javascript">
$('#form_distance').slideUp('slow');
document.getElementById('delivery').onchange = function(){
  
  if($('#delivery').val()=='onsite') {

  		 $('#form_distance').slideDown('slow');  
    } else {
    		$('#distance').val(0);
    		$('#form_distance').slideUp('slow');
    }
    
}
                    
                   
           
</script>

<script type="text/javascript">
$(document).ready(function(){
	 $('#distance').keyup(function(){
        $('#result').text($('#distance').val() * 20000);
        $('#result').digits();
        $('#result_info').val($('#distance').val() * 20000);
    }); 
});
</script>

<script type="text/javascript">
document.getElementById('payment').onchange = function(){

	if($('#payment').val()==3) {
		document.getElementById("cc_number").readOnly=true;
  		document.getElementById("top_duration").readOnly=false; 
  		document.getElementById("top_duration").focus(); 
    } else if($('#payment').val()==4){
    	$('#top_duration').val(0);
    	document.getElementById("top_duration").readOnly=true;
    	document.getElementById("cc_number").readOnly=false;
    	document.getElementById("cc_number").focus();
    } else {

    	document.getElementById("top_duration").readOnly=true;
		document.getElementById("cc_number").readOnly=true;
    }
}	

document.getElementById("top_duration").readOnly=true;
document.getElementById("cc_number").readOnly=true;
</script>

<script>
$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}
</script>