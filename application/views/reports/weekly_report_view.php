<style type="text/css">

.dropzone {
  margin-top: 100px;
  border: 2px dashed #0087F7;
}
table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child {
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr {
	text-align: center;
	padding-left:20px;
}
table td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td {
	border-bottom:0;
}
table tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}

</style>

<div class="">

    <div class="page-title">
    
<div id="example_wrapper"></div>
        
    </div>
     <div class="clearfix"></div>
      <div class="row">
         

            <div class="x_panel">
                  <div class="x_title">
                    <h2>Price Cek Report <small>--/--</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="<?php echo  base_url()?>arsip/petunjukpricecek.pdf" target="_blank">Panduan Pengisian</a>
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

                <div class="row">
           
                <form class="form-horizontal form-label-left" id="formfilter">

	                <div class="col-md-3">
	                	<div class="form-group"><?php echo $form_store; ?></div>
	                </div>
	                <div class="col-md-3">
	               	 <div class="form-group"><?php echo $form_kategori; ?></div>
	                </div>
	                <div class="form-group">
                        <div class="col-md-6 col-sm-6 ">
                          <button type="button" class="btn btn-primary" id="btn-filter">Filter</button>
						            <button type="button" class="btn btn-info" id="btn-Reset"> Reset</button>
                        
                          <button type="button" class="btn btn-default pull-right"  onclick="reload_table()" ><span class="fa fa-refresh"></span> Reload Data</button>
						  <div id="colvis"></div>
            
                        </div>
                      </div>

                      <div class="form-group">

                      </div>
	                </form>

                </div>


                  <table class="table table-bordered nowrap table-hover gridtable" id="table1" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">
                      <thead>
                     <tr>
                          <th bgcolor="#FFFFFF"  class=" info text-center" rowspan="2">#</th>
                          <th class="info text-center" rowspan="2">id</th>
                          <th class="info text-center" rowspan="2">Store</th>
                        
                          <th class="info text-center " rowspan="2">L1_name</th>
                          <th class="info text-center" rowspan="2">Prod_cd</th>
                          <th class="info text-center" rowspan="2">Prod_nm</th>
                         <th class="text-center" rowspan="2">Str cd</th>
                          <th class="info text-center"  rowspan="2">sale_qty</th>
        				          <th class="info text-center" rowspan="2" >sale_amt</th>
        				          <th class="info text-center"  rowspan="2">profit</th>
        				  
        				          <th class="info text-center"  rowspan="2">stk_qty</th>
        				          <th class="info text-center"  rowspan="2">stk_camt</th>
        				          <th class="info text-center" rowspan="2">stk_samt</th>
        				          <th class="info text-center" rowspan="2">buy_prc</th>
        				          <th class="info text-center" rowspan="2">sale_prc</th>
        				          <th class="info text-center" rowspan="2">%rt</th>
        				          <th class="info text-center" rowspan="2">scm1</th>
        				          <th class="info text-center" rowspan="2">disc1</th>
        				          <th class="info text-center" rowspan="2">prc1</th>
        				     
        				          <th class="info text-center" rowspan="2">scm2</th>
        				          <th class="info text-center" rowspan="2">disc2</th>
        				          <th class="info text-center" rowspan="2">prc2</th>
        				    
        				          <th class="info text-center" rowspan="2">scm3</th>
        				          <th class="info text-center" rowspan="2">disc3</th>
        				          <th class="info text-center" rowspan="2">prc3</th>
        				     
        				          <th class="info text-center" rowspan="2">limit</th>
        				          <th class="info text-center" rowspan="2">ea</th>
        				          <th class="info text-center" rowspan="2">uom</th>
        				          <th class="info text-center" rowspan="2">Harga Termurah</th>
                          <th class="text-center" colspan="6">INDOGROSIR</th>
                          <th class="text-center" rowspan="2">Index 1</th>
                          <th class="text-center" rowspan="2">Harga stl Point</th>
                          <th class="text-center" rowspan="2">Index 2</th>
                          <th class="text-center" rowspan="2">Status COMM DF</th>
                    </tr>
                    <tr>
                        <th class="text-centertg-yw4l">Regular</th>
                        <th class="text-center tg-yw4l">Price lv 1</th>
                        <th class="text-center tg-yw4l">Price lv 2</th>
                        <th class="text-center tg-yw4l">Price Lv 3</th>
                        <th class="text-center tg-yw4l">Qty Termurah</th>
                        <th class="text-centertg-yw4l">Price Termurah</th>
                        
                      </tr>
                    </thead>
    


                         <tbody>
                                                    
                         </tbody> 
          
     </table>

                </div>
                <div class="pull-right">
                <i id="disini"></i>
                </div>

</div>


       
      </div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalupload" data-backdrop="static" data-keyboard="false" style="color:#000000">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Upload Price Cek by file excel</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Petunjuk :</h4>
                          <ol>
                              <li>Pastikan file excel berextensi <b>*.xls</b>. Template dapat diunduh <a href=" ">di sini.</a></li>
                              <li>Isi template dengan data Anda dan upload pada form dibawah.</li>
                              <li>Kolom header harus sesuai dengan template dan pastikan mengecek data kembali setelah upload file berhasil.</li>
                          </ol>

                         <form action="#" class="dropzone col-md-3"></form>
          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                        </div>

                      </div>
                    </div>
                  </div>




<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true" id="price_option">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Update Price Level ?</h4>
                        </div>
                        <div class="modal-body">
                          	 <form id="form_price_option" data-parsley-validate class="form-horizontal form-label-left" >
                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Product Code</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				 
                       				  <input type="text" id="prod_code"  class="form-control hidden" disabled="disabled" placeholder="Disabled Input">
                       				  <input type="text" id="str_cd"  class="form-control" disabled="disabled" placeholder="Disabled Input">
                       				  <input type="text" id="str_nm"  class="form-control hidden" disabled="disabled" placeholder="Disabled Input">
                       				  <input type="text" id="prod_x"  class="form-control" disabled="disabled" placeholder="Disabled Input">
                       				 </div>
                          	 	</div>	

                              <div id="hiddenforho">
                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Regular Price</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				  <input type="number" id="reg_price" name="reg_price" class="form-control"  placeholder="Input here">

                       				 </div>
                          	 	</div>
                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Price level 1</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				  <input type="number" id="prc_lv1" name="prc_lv1" class="form-control"  placeholder="Input here">

                       				 </div>
                          	 	</div>
                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Price level 2</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				  <input type="number" id="prc_lv2" name="price_lv2" class="form-control"  placeholder="Input here">

                       				 </div>
                          	 	</div>

                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Price level 3</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				  <input type="number" id="prc_lv3" name="price_lv3" class="form-control"  placeholder="Input here">

                       				 </div>
                          	 	</div>
                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Qty Termurah</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				  <input type="number" id="qty_lower" name="qty_lower" class="form-control"  placeholder="Input here">

                       				 </div>
                          	 	</div>
                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Price Termurah</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				  <input type="number" id="prc_lower" name="prc_lower" class="form-control"  placeholder="Input here">

                       				 </div>
                          	 	</div>
                          	 	<div class="form-group">
                          	 	<label class="control-label col-md-3">Harga Setelah Point</label>
                       				 <div class="col-md-9 col-sm-9 col-xs-12">
                       				  <input type="number" id="prc_point" name="prc_point" class="form-control"  placeholder="Input here">

                       				 </div>
                          	 	</div>

                              </div>

                              <div class="form-group" id="formkomenetar">
                              <label class="control-label col-md-3">Approval COMM DF</label>
                               <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea id="comment" name="comment" class="form-control"  placeholder="Input here" col="5" ></textarea>

                               </div>
                              </div>
                          	 </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary btn-process">Save changes</button>
                        </div>

                      </div>
                    </div>
 </div>





<script>

var table ;
$(document).ready(function(){
    $(".btn1").click(function(){
        $("p").hide();
    });
    $(".btn2").click(function(){
        $("p").show();
    });

table = $('#table1').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    "ajax": {
            "url": "<?php echo site_url('weekly_reports/ajax_list_weekly_reports')?>",
            "type": "POST",
            "data":function (data){
            	data.filter_store = $('#filter_store').val();
            	data.filter_kategori = $('#filter_kategori').val();
            }
        },

    "dom": 'l<"#pindah"B>frtip',     
    //"dom": 'lBfrtip',

    "pageLength": 15,
    "aLengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],

 

     buttons: [
        {
            extend: 'excel',
            text: '<span class="fa fa-file-excel-o"></span> Excel Export',
            className : 'btn btn-warning btn-xs',
            title: 'Price Cek LSI',
            exportOptions: {
         <?php if ($this->session->userdata('level') == '1' || $this->session->userdata('level') == '2' ) {  ?>  
         
         <?php } else { ?>
               columns: [ 0, 1, 2, 3,4,5,28,29,30,31,32,33,34,35,36,37,38 ],
         <?php } ?>     
               
                modifier: {
                    search: 'applied',
                    order: 'applied'
                }
            }
        },
        {

          extend :'csv',
          text : '<span class="fa fa-file-o"></span> Export csv',
           className : 'btn btn-warning btn-xs',
           title: 'Price Cek LSI - *',
          exportOption :{

            modifier:{
                search:'applied',
                order: 'applied'
            }
          }

        }
    ],

    //Set column definition initialisation properties.
   

<?php if ($this->session->userdata('level') == '1' || $this->session->userdata('level') == '2' ) {  ?>   
     "columnDefs": [
        { 
            "targets": [ 0 ], //last column
            "orderable": false, //set not orderable
        },
         { 
            "targets": [ 1,2,3 ], //last column
            "visible": false, //set not orderable
        },
        ], 


  <?php } else { ?>

        "columnDefs": [
        {
          "targets": [ 0 ], //last column
               "orderable": false, //set not orderable
        },
            {
                "targets": [ 1,2,3,7,8,9,10,11,12,13,14,15,16,17,18,19,20 ],
                "visible": false
               
            },
            {
                "targets": [ 21,22,23,24,25,26,27 ],
                "visible": false
            },

        ],

    <?php } ?>




  
    scrollY:        "400px",
    scrollX:        true,
   

    "sScrollX": true,
    "sScrollXInner": "160%",
    fixedColumns:   {
            leftColumns: 7
        }

    });

  



 
	$('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });

	$('#btn-Reset').click(function(){ //button reset event click
        $('#formfilter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
       
    });
   

});

</script>


<script>
$('#table1 tbody').on('dblclick', 'tr', function () {

        var data = table.row( this ).data();
        var prod_cd = data[1];
        //alert( 'You clicked on '+data[3]+'\'s row' );
        $('#form_price_option')[0].reset();
        $('#price_option').modal('show');
        $('.btn-process').show();
		    $('#prod_code').val(prod_cd);

        <?php if ($this->session->userdata('level') == '2'){ ?>

         $('#hiddenforho').hide();

         <?php  } else if ($this->session->userdata('level') == '3') { ?>

          $('#formkomenetar').hide();
         <?php } else if($this->session->userdata('level') == '1') { ?>
          $('#formkomenetar').show(); 

          <?php } ?>
		var kode = prod_cd;
        $.ajax({
	 		url :"<?php echo  base_url()?>/weekly_reports/edit_pricecek/"+kode,
	 		type: 'GET',
	 		dataType: 'JSON',
	 	
	 		success: function(data){


	 		 
	 			try{  

          if(data.length == 0  ) {

                alert('Error get data from ajax ');    


          } else {
              
              
                  $('#str_cd').val(data.str_cd);
                  $('#prod_x').val(data.prod_cd);
                  $('#str_nm').val(data.str_nm);
                  $("#reg_price").val(data.prc_reg);
                  $("#prc_lv1").val(data.prc_lv_1);
                  $("#prc_lv2").val(data.prc_lv_2);
                  $("#prc_lv3").val(data.prc_lv_3); 
                  $("#qty_lower").val(data.qty_low);
                  $("#prc_lower").val(data.prc_low);
                  $("#prc_point").val(data.prc_point);
                  $("#comment").val(data.coment);
          }
	 				
	 

	 				
	 			}catch(e) {  
                    $('#str_cd').val();
                    $('#prod_x').val();
          	 				$('#str_nm').val();
                    $("#reg_price").val();
          			 		$("#prc_lv1").val();
          			 		$("#prc_lv2").val();
          			 		$("#prc_lv3").val();	
          			 		$("#qty_lower").val();
          			 		$("#prc_lower").val();
          			 		$("#prc_point").val();
                    $("#comment").val();

          
	 				 alert('Error get data from ajax');
                  
                  }  
	 			
	 			 			
	 		},
	 		error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }



 	});

        return false;

   
    } );

</script>






<script>
$('#price_option').on('click', '.btn-process', function(e) {
	$('.btn-process').text('saving..');
 	$('.btn-process').attr('disable',true);

 			 var str_cd = $(".modal-body #str_cd").val();
 			 var str_nm = $(".modal-body #str_nm").val();
        	 var prod_cd1 = $(".modal-body #prod_code").val();
        	 var prod_x = $(".modal-body #prod_x").val();
        	 var prc_reg_d = $(".modal-body #reg_price").val();
        	 var prc_1 =  $(".modal-body #prc_lv1").val();
        	 var prc_2 =  $(".modal-body #prc_lv2").val();
        	 var prc_3 =  $(".modal-body #prc_lv3").val();
        	 var qty_low_d =  $(".modal-body #qty_lower").val();
        	 var prc_low_d =  $(".modal-body #prc_lower").val();
        	 var prc_point_d =  $(".modal-body #prc_point").val();
        	 var komentar = $(".modal-body #comment").val();
        


		        $.ajax({
		        	 url: "<?php echo  base_url()?>/weekly_reports/insert_pricecek",
		           data :{'prod_cd': prod_cd1,'prod_x':prod_x,'str_cd':str_cd,'str_name':str_nm,'prc_reg':prc_reg_d,'prc_lv1' : prc_1,'prc_lv2': prc_2,'prc_lv3':prc_3,'qty_low':qty_low_d,'prc_low':prc_low_d,'prc_point':prc_point_d,'coment':komentar},
		      		 type: "POST",
		      		 cache: false,

		      		 success: function(json) {
		      		 	var obj = jQuery.parseJSON(json);
     					  var a = obj['STATUS'];
		      		 	try{  	

		      		 		 if (a =='true') {
		      		 		 $('#price_option').modal('hide');
		      		 		   PNotify.prototype.options.styling = "bootstrap3";
										new PNotify({
										title: 'Successfully',
										text: 'Success updating data.',
										type: 'success',
										stack: {"dir1":"down", "dir2":"right", "push":"top"},
										});



		      		 		  table.ajax.reload(null,false);  //just reload table
		      		 		   $('.btn-process').text('Save changes'); //change button text
		      		 		  return false;

		      		 		} else  if(a == 'false'){

							             alert('Gagal Updating Data!  ');
							             $('.btn-process').text('Save changes'); //change button text
							              return false;
							        }

		      		 	} catch(e) { 
		      		 			PNotify.prototype.options.styling = "bootstrap3";
                                new PNotify({

                                title: 'ERROR',
                                text: 'GAGAL DALAM UPDATE DATA',
                                type: 'error',
                                stack: {"dir1":"down", "dir2":"right", "push":"top"},
                                
                              });
                                return false;
		      		 	}
		      		 },
		      		 error: function(){      
                   	alert('Error while request..');
                   	  $('.btn-process').text('Save changes'); //change button text
                  },

		        });
         	

         });

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>

<script>

$('#export_excel_this').on('click', function(e) {


alert('export this');

});
</script>

<script>

$(document).ready(function(){


var butoonx = document.getElementById("pindah");
var content = document.getElementById("disini");

 $("#disini").html(butoonx);

  });

</script>

<script type="text/javascript">

$('#foruploadexcel').on('click', function(e) {
    $('#modalupload').modal('show');


      Dropzone.options.myAwesomeDropzone = {
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      accept: function(file, done) {
        if (file.name == "template_store_upload.xls") {
          done("Naha, you don't.");
        }
        else { done(); }
      }
    };
  });
</script>