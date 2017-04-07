<div class="">

<div class="page-title">
    
<div id="example_wrapper"></div>
        
    </div>
     <div class="clearfix"></div>
      <div class="row">
      	<div class="x_panel">
                  <div class="x_title">
                    <h2>New Transaction  <small>--/--</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" target="_blank">Panduan Pengisian</a>
                          </li>
                          <li><a href="javascript:void(0)" id="foruploadexcel">Upload by Excel</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="javascript:void(0)" method="" id="form-transaction">


                
             <!--      	<div class="row form-group">
				        <div class="col-xs-12">
				            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
				                <li class="active"><a href="#step-1">
				                    <h4 class="list-group-item-heading">Step 1</h4>
				                    <p class="list-group-item-text">Input Item </p>
				                </a></li>
				                <li class="disabled"><a href="#step-2">
				                    <h4 class="list-group-item-heading">Step 2</h4>
				                    <p class="list-group-item-text">Second step description</p>
				                </a></li>
				                <li class="disabled"><a href="#step-3">
				                    <h4 class="list-group-item-heading">Step 3</h4>
				                    <p class="list-group-item-text">Third step description</p>
				                </a></li>
				            </ul>
				        </div>
					</div> -->
					
								<div class="form-group">
								<button class="btn btn-primary" id="loaddata">Add Item</button>
								
								</div>
								
								<div class="row">

									<div class="col-md-3">
			                    	<div class="form-group">
			                    	<label></label>
			                    		 <div class="form-group"><input type="text" name="prod_cd" id="prod_cd" class="form-control" placeholder="Input product cd here" title="input product code"></div>
			                    	</div>
			                  		</div>

								</div>
								<br/>
								
								<h4>Summary Order Transaction</h4>
								<table class="table table-hover" caption"Hello" id="example2" >
									<thead>
				 							<tr>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;"># </th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Code</th>
												<th class="warning col-md-3" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Name</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Stock</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Stok Value</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Reg</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Khusus</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Qty</th>
												<th class="warning col-md-2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Total</th>
											</tr>
									 </thead>

									 	<tbody>
									 	<tr>
												<td style="border:thin solid #cacaca; text-align:center;"><a href="#" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"> </a></td>
												<td style="border:thin solid #cacaca; text-align:center;">1065841000</td>
												<td style="border:thin solid #cacaca; text-align:center;">PEPSODENT PG WHITE 120 G</td>
												<td style="border:thin solid #cacaca; text-align:center;">340.00</td>
												<td style="border:thin solid #cacaca; text-align:center;">2.950.403,00</td>
												<td style="border:thin solid #cacaca; text-align:center;">4.569,00</td>
												<td style="border:thin solid #cacaca; text-align:center;">4.500,00
													<!-- <input type="number" name="special_prc" id="special_prc" />  -->
												</td>
												<td style="border:thin solid #cacaca; text-align:center;">
													<!-- <input type="number" name="qty_x" id="qty_x" style="width:50px" />  -->12
												</td>
												<td style="border:thin solid #cacaca; text-align:center;">320.000,00</td>


										</tr>
										<tr>
										<td style="border:thin solid #cacaca; text-align:center;"><a href="#" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this item?');"> </a></td>
												<td style="border:thin solid #cacaca; text-align:center;">1023784000</td>
												<td style="border:thin solid #cacaca; text-align:center;">TARO SNACK BBQ 40X12G/CT</td>
												<td style="border:thin solid #cacaca; text-align:center;">1000.00</td>
												<td style="border:thin solid #cacaca; text-align:center;">7.950.000,00</td>
												<td style="border:thin solid #cacaca; text-align:center;">2.700,00</td>
												<td style="border:thin solid #cacaca; text-align:center;">2.500,00
													<!-- <input type="number" name="special_prc" id="special_prc" />  -->
												</td>
												<td style="border:thin solid #cacaca; text-align:center;">
													<!-- <input type="number" name="qty_x" id="qty_x" style="width:50px" />  -->10
												</td>
												<td style="border:thin solid #cacaca; text-align:center;">250.000,00</td>
										</tr>
									 	</tbody>
									 	<tfoot>
									 		
									 		<tr>
													<th  class="success" colspan="8" style="border:thin solid #cacaca; padding-left:20px;font-size:14px;  ">
														JUMLAH : 
													</th>
													<th style="border:thin solid #cacaca; text-align:center;font-size:14px; "><b>570.000,00</b></th>
											</tr>
									 	</tfoot>

								</table>
							

								<div class="col-md-12">
								<!-- <button type="submit" class="btn btn-primary pull-right next-payment"><span class="fa fa-arrow-circle-right"></span> CONTINUE CHEKOUT</button>
 -->
 									<a href="<?php echo site_url('white_spot/delivery_rules')?>" class="btn btn-primary pull-right"><span class="fa fa-arrow-circle-right"></span> CONTINUE CHEKOUT</a>

									</div>
					
					


					 	
				

                  </div>

                  </form>
                </div>
         </div>
      </div>

</div>


<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true" id="price_option">
    <div class="modal-dialog">
      <div class="modal-content">
      		  <div class="modal-body">

      		  product
      		  </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-process">Pilih</button>
        </div>
      </div>
       
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
  	
  	var table = $('#example2').DataTable({
  		searching: false,
  		paging: false,
  		"columnDefs": [
        { 
            "targets": 0 , //last column
            "orderable": false, //set not orderable
        },
         { 
            "targets": [ 1,2, ], //last column
            "orderable": false, //set not orderable
        },
        ], 
  	});

  	});

</script>

<script>
$('#loaddata').on('click', function () {

	alert('ok');

	//$('#price_option').modal('show');

});
</script>

<script>
$('.next-payment').on('click', function () {

	alert('oke');

		 $.ajax({

		 	 url :"<?php echo  base_url()?>/white_spot/delivery_rules/",
		 	 type: 'POST',
		 	 success: function(data){
		 	 	$('#load-1').html(data);
		 	 },
		 	  error: function (jqXHR, textStatus, errorThrown){
		 	  	alert('False Exeption while request..');
		 	 	 return false;
		 	 }

		 });

});
</script>

<script>
$('form#form-transaction').on('submit', function () {

	alert('ok');

	//$('#price_option').modal('show');

});
</script>
