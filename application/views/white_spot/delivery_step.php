<div class="row">
<div class="x_panel">
<div class="x_content">
<form>
 <div class="col-md-8">
 <div class="row">
 <div class="form-group col-md-4">
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
 <div class="col-md-6">
 <div class="form-group">
	  <label>Nama White Spot</label>
	   <input type="text" class="form-control" name="ws_name" id="ws_name" placeholder="Nama White spot" readonly="">
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
		<input type="checkbox" id="sama_alamat"> Sama dengan Alamat Diatas
	</div>	  
<textarea class="form-control" rows="3" name="send_alamat" id="send_alamat" placeholder='Alamat pengiriman detail' required=""></textarea>                     
	 
                        
</div>

<div class="form-group">
    <label>Choose Delivery Metode</label>
      <select id="payment" name="payment" class="form-control" required>
        <option value="1">Free Delivery</option>
        <option value="2">On Site Delivery</option>
        <option value="3">TOP (Ketentuan jangka waktu pembayaran )</option>
        <option value="4">Credit Card</option>                    
      </select>
</div>

<div class="form-group">
 <label>Choose Payment Metode</label>
  <select id="payment" name="payment" class="form-control" required>
    <option value="1">Cash</option>
    <option value="1">Via Transfer</option>
    <option value="2">TOP (Ketentuan jangka waktu pembayaran )</option>
    <option value="3">Credit Card</option>                                 
  </select>

</div>









<br/>
<br/>
<div class="col-md-12 col-md-offset-12">
								<!-- <button type="submit" class="btn btn-primary pull-right next-payment"><span class="fa fa-arrow-circle-right"></span> CONTINUE CHEKOUT</button>
 -->
 <div class="form-group">
 <a href="<?php echo site_url('white_spot/create_invoice')?>" onclick="confirm()" class="btn btn-primary pull-right"><span class="fa fa-file-text-o"></span> PRINT INVOICE</a>
 	<a href="<?php echo site_url('white_spot/transaction')?>" class="btn btn-info pull-right"><span class="fa fa-arrow-circle-left"></span> KEMBALI KE POS</a>
 	
 </div>
</div>











  </div>



</form>
</div>
</div>
</div>


<!-- <div class="col-md-12">
<a href="javascript:void(0)" class="btn btn-info pull-left next-invoice"><span class="fa fa-arrow-circle-right"></span> PREVIOUSE</a>
<a href="javascript:void(0)" class="btn btn-primary pull-right next-invoice"><span class="fa fa-arrow-circle-right"></span> NEXT</a>
</div> -->

<script>
function confirm(){

	alert('Print Invoice');
}
</script>