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
								<button class="btn btn-primary" id="loaddata"><span class="fa fa-plus"></span> Add Item</button>
								
								</div>
								
							<!-- 	<div class="row">

									<div class="col-md-3">
			                    	<div class="form-group">
			                    	<label></label>
			                    		 <div class="form-group"><input type="text" name="prod_cd" id="prod_cd" class="form-control" placeholder="Input product cd here" title="input product code"></div>
			                    	</div>
			                  		</div>

								</div> -->
								<br/>

								<form action="<?php echo site_url('white_spot/delivery_rules')?>" method="POST" id="form-transaction">
								<h4>Summary Order Transaction</h4>
								<div id="list_order">
								<table class="table table-hover" caption"Hello" id="example2" >
									<thead>
				 							<tr>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;"># </th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Code</th>
												<th class="warning col-md-3" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Name</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Stock</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Stok Value</th>
												<th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Reg</th>
												<th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Khusus</th>
												<th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Qty</th>
												<th class="warning col-md-2" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Total</th>
											</tr>
									 </thead>

									 	<tbody>
								<?php
									$no =1;
									$jmla = 0;
									$jmlb = 0;
									?>
								<?php	
								// if(count($detail) > 0 ) {
								foreach ($detail as $result) { ?>

								
								<?php 
								 if($result->spec_prc==0) {

									$total =($result->qty_order * $result->sale_prc);

								}else {
									
									$total =($result->qty_order * $result->spec_prc);
								}

								 $jmla+= ($total);

								?>

									 	<tr>
												<td style="border:thin solid #cacaca; text-align:center;"><a href="#" class="glyphicon glyphicon-trash" onclick="delete_order(<?php echo $result->noid_tsc ?>)"> </a></td>
												<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->prod_cd ?></td>
												<td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->prod_nm ?></td>
												<td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->stk_qty,2,',',',') ?></td>
												<td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->stk_camt,2,',',',') ?></td>
												<td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->sale_prc,2,',',',') ?></td>
												<td contenteditable="true" onBlur="saveToDatabase(this,'spec_prc','<?php echo $result->noid_tsc; ?>')" style="border:thin solid #cacaca; text-align:center;" onClick="showEdit(this);"><?php echo number_format($result->spec_prc,2,',',',')?></td>
												<td contenteditable="true" type="number"  onBlur="saveToDatabase(this,'qty_order','<?php echo $result->noid_tsc; ?>')" style="border:thin solid #cacaca; text-align:center;" onClick="showEdit(this);"><?php echo number_format($result->qty_order,2,',',',') ?>
													
												</td>
												<td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($total,2,',',',') ?>
													
												</td>

										</tr>
										<?php
												
											}

											?>
									 	</tbody>
									 	<tfoot>
									 		
									 		<tr>
													<th  class="success" colspan="8" style="border:thin solid #cacaca; padding-left:20px;font-size:14px;  ">
														JUMLAH : 
													</th>
													<th style="border:thin solid #cacaca; text-align:center;font-size:14px; "><b><?php echo number_format($jmla,2,',',',') ?></b></th>
													<th class="warning hidden"><input type="text" class="hidden" name="total_order" id="total_order" value="<?php echo $jmla ?>"/></th>
											</tr>
									 	</tfoot>

								</table>

									<div class="col-md-12" style="margin-top:20px;">
								<!-- <button type="submit" class="btn btn-primary pull-right next-payment"><span class="fa fa-arrow-circle-right"></span> CONTINUE CHEKOUT</button>
 -->
 									<button type="submit" href="<?php echo site_url('white_spot/delivery_rules')?>" class="btn btn-primary pull-right"><span class="fa fa-arrow-circle-right"></span> CONTINUE CHEKOUT</a>

									</div>
					
					
						</div>

                  	 </form>
                  </div>

                 
               </div>

            </div>
 </div>


    



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="price_option">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      		  <div class="modal-body">
      		  <h4>List Product</h4>
      			<div class="row">
      		  		
                    	<div class="form-group col-md-4">
                    		<div class="form-group"><?php echo $form_kategori; ?></div>
                    	</div>
                   
                    	 <div class="form-group">
                    	  <button type="button" class="btn btn-primary" id="btn-filter">Filter</button>
                    	 </div>
               </div>   	
             <br/>     	

      		
      		<table class="table table-bordered nowrap table-hover gridtable" id="table1" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">
      		
      		  	 <thead>
      		  	
      		  			 <th bgcolor="#FFFFFF"  class=" info text-center" >#</th>
                          <th class="info text-center" >prod_cd</th>
                          <th class="info text-center" >str_cd</th>
                          <th class="info text-center" >prod_nm</th>
                          <th class="info text-center" >l1_nm</th>	
                          <th class="info text-center" >stk_qty</th>
                          <th class="text-center" >sale_prc</th>

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
</div>


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
	            "url": "<?php echo site_url('white_spot/ajax_list_product')?>",
	            "type": "POST",
	        
	            // "beforeSend":function(){
	            //    $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
	            //  },

	            "data":function (data){
	             
	              data.filter_kategori = $('#filter_kategori').val();
	             
	            },

	        },

	  "pageLength": 10,
	  "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 

	  "columnDefs": [
	        { 
	            "targets": [ 0 ], //last column
	            "orderable": false, //set not orderable
	        },
	        { 
	            "targets": [ 2 ], //last column
	            "visible": false, //set not orderable
	        },

	         ],  

  	});

 $('#btn-filter').click(function(){ //button filter event click
    // $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' />");
        table.ajax.reload(null,false);  //just reload table
    });
  });
</script>


<script>

function showEdit(editableObj) {
			$(editableObj).css("background","#f4e6a8");
		} 
function saveToDatabase(editableObj,column,id) {
	$(editableObj).css("background","#f4e6a8 no-repeat right");
	$.ajax({
		url: "<?php echo site_url('white_spot/save_edit_trc')?>",
		type: "POST",
		data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
		success: function(data){
			$(editableObj).css("background","#FDFDFD");
			$('#list_order').load(location.href + " #list_order");	
		}        
   });
}
</script>
















<script type="text/javascript">
$('#table1 tbody').on('dblclick', 'tr', function () {
var data = table.row( this ).data();
var prod_cd = data[1];
var str_cd = data[2];


 $.ajax({

 	  url :"<?php echo  base_url()?>/white_spot/insert_trans_temp/",
 	   data: {'prod_cd': prod_cd,'str_cd': str_cd},
 	  type: 'POST',
 	  beforeSend: function(){
        $('#demo2').show();
        $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
      },
      success: function(data){

      		var obj = jQuery.parseJSON(data);
            var message = obj['STATUS'];
            try {
            		 if(message=='true') {
								     		 
								              PNotify.prototype.options.styling = "bootstrap3";
								                     new PNotify({
								                      title: 'Successfully',
								                      text: obj['msg'],
								                      type: 'success',
								                      stack: {"dir1":"down", "dir2":"right", "push":"top"},
								                    });

								                    $('#price_option').modal('hide');
        											$('#list_order').load(location.href + " #list_order");	

        											 	
        											 
								          }


					if(message=='false') {

                	 	  PNotify.prototype.options.styling = "bootstrap3";
                          new PNotify({

                          title: 'Error',
                          text: obj['msg'],
                          type: 'error',
                          stack: {"dir1":"down", "dir2":"right", "push":"top"},
                          }); 

                          $('#price_option').modal('hide');

                	 }			          

		        }catch(e) {  
                          PNotify.prototype.options.styling = "bootstrap3";
                            new PNotify({

                            title: 'Error',
                            text: 'Exception False While Request.',
                            type: 'error',
                            stack: {"dir1":"down", "dir2":"right", "push":"top"},
                            });       
                          
                            $('.export_to').text('Export');
         					$('.export_to').attr('disabled',false);
                            

                              }     

      },

       error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error sent data from ajax');
          }

 });

});
</script>






 <script type="text/javascript">
  // $(document).ready(function() {
  	
  //  $('#example2').DataTable({
  // 		searching: false,
  // 		paging: false,
  // 		"columnDefs": [
  //       { 
  //           "targets": 0 , //last column
  //           "orderable": false, //set not orderable
  //       },
  //        { 
  //           "targets": [ 1,2, ], //last column
  //           "orderable": false, //set not orderable
  //       },
  //       ],

  //     scrollY:        "200px",
  // 	});

  // 	});

// </script>

<script>
$('#loaddata').on('click', function () {

//	alert('ok');

	$('#price_option').modal('show');

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

<script>
 function delete_order(id){

 if(confirm('Are you sure delete this data?')) {
 		$.ajax({
            url : "<?php echo  base_url()?>white_spot/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
            	PNotify.prototype.options.styling = "bootstrap3";
		        new PNotify({
		        title: 'Notification',
		        text: 'Sukses Delete This Data.',
		        type: 'success',
		        stack: {"dir1":"down", "dir2":"right", "push":"top"},
		        });

		        $('#list_order').load(location.href + " #list_order");	
            },

            error: function (jqXHR, textStatus, errorThrown)
         	 {
              alert('Error sent data from ajax');
          	}

         });
 	}

 	}
</script>