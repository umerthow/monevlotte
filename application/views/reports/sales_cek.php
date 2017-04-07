<div class="">

<div class="page-title">
    
<div id="example_wrapper"></div>
        
    </div>
     <div class="clearfix"></div>
      <div class="row">

      	 <div class="x_panel">
                  <div class="x_title">
                    <h2>Sales Cek Report <small>--/--</small></h2>
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

                   <div class="row">
                   <form  id="formfilter">
                   <div class="col-md-3">
                    	<div class="form-group">
                    		 <div class="form-group"><?php echo $form_store; ?>
                    		 	 
                    		 </div>
                    	</div>
                  	</div>
                   	<div class="col-md-3">
                    	<div class="form-group">
                    		<div class="form-group"><?php echo $form_kategori; ?></div>
                    	</div>
                  	</div>
                  	<div class="col-md-3">
                    	<div class="form-group">
                    		 <div class="form-group"><input type="text" name="c_grp" id="c_grp" class="form-control" placeholder="Input cust grp here" title="input c_grp"></div>
                    	</div>
                  	</div>

					         <div class="col-md-3">
                    	<div class="form-group">
                    		 <div class="form-group"><input type="text" name="ven_cd" id="ven_cd" class="form-control" value="025647" placeholder="Input ven code here" title="input ven_cd"></div>
                    	</div>
                  	</div>
                  	<div class="col-md-3">
                    	<div class="form-group">
                    		 <div class="form-group"><input type="text" name="grp_cd" id="grp_cd" class="form-control" value="" placeholder="Input grp cd here" title="input grp_cd"></div>
                    	</div>
                  	</div>
                  	<div class="col-md-3">
                    	<div class="form-group">
                    		<div class="input-group date form_date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="8"  name="date_start" id="date_start" type="text" placeholder="start date" title="input start date" readonly >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         </div>
                    	</div>
                  	</div>
                  	<div class="col-md-3">
                    	<div class="form-group">
                    		<div class="input-group date form_date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                     <input class="form-control" size="8"  name="date_end" id="date_end" type="text" placeholder="end date" title="input end date" readonly >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         </div>
                    	</div>
                  	</div>

                  	 <div class="form-group">
                        <div class="col-md-6 col-sm-6 ">
                          <button type="button" class="btn btn-primary" id="btn-filter">Filter</button>
                          <button type="button" class="btn btn-info" id="btn-Reset"> Reset</button>


                            
                         
             
                          <div id="colvis"></div>
                          
                        </div>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default"  onclick="reload_table()" ><span class="fa fa-refresh"></span> Reload Data</button>
                            <button class="btn btn-info export_to" type="button"><span class="fa fa-download"></span> Export </button>
                            <button class="btn btn-default" type="button">#</button>
                          </div>

                  </div>

                  </form>
                   </div>

                   <br/>
                   <br/>
                    <table class="table table-bordered nowrap table-hover gridtable" id="table1" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">

                    <thead>
                     <tr>
                          <th bgcolor="#FFFFFF"  class=" info text-center" >#</th>
                          <th class="info text-center" >sale dy</th>
                          <th class="info text-center" >store Cd</th>
                          <th class="info text-center" >c_grp</th>	
                          <th class="info text-center" >l1_cd</th>
                          <th class="text-center" >prd cd</th>
                          <th class="info text-center" >prod_nm</th>     
                          <th class="info text-center"  >sale_qty</th>
                          <th class="text-center" >buy amt</th>
                          <th class="info text-center"  >sale_amt</th>
                          <th class="info text-center"  >profit</th>		

                      </tr>
                      
                      </thead>
    


                         <tbody>
                                                    
                         </tbody>     

                    </table>



                  </div>	

         </div>
               




      </div>




</div>

<script>
var table ;

$(document).ready(function(){


	table = $('#table1').DataTable({
	 "serverSide": true, //Feature control DataTables' server-side processing mode.
	 "order": [], //Initial no order.
	 "oLanguage": {
	         "sProcessing": "<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> <b>Please Wait...</b>"
	       },
	 "processing": true, //Feature control the processing indicator.  

	 "ajax": {
	            "url": "<?php echo site_url('sales/ajax_list_sales_report')?>",
	            "type": "POST",
	        
	            // "beforeSend":function(){
	            //    $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
	            //  },

	            "data":function (data){
	              data.c_grp = $('#c_grp').val();
	              data.ven_cd = $('#ven_cd').val();
	              data.grp_cd = $('#grp_cd').val();
	              data.filter_store = $('#filter_store').val();
	              data.filter_kategori = $('#filter_kategori').val();
	              data.date_start = $('#date_start').val();
	              data.date_end = $('#date_end').val();
	            },

	        },


	  "pageLength": 20,
	  "aLengthMenu": [[20, 35, 50, -1], [20, 35, 50, "All"]],    

	  "columnDefs": [
	        { 
	            "targets": [ 0 ], //last column
	            "orderable": false, //set not orderable
	        },

	         ],


	   scrollY:        "400px",
	   scrollX:        true,
	   

	    "sScrollX": "130%",
	    "sScrollXInner": "130%", 

	});


 $('#btn-filter').click(function(){ //button filter event click
    // $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' />");
        table.ajax.reload(null,false);  //just reload table
    });

  $('#btn-Reset').click(function(){ //button reset event click
        $('#formfilter')[0].reset();

        table.ajax.reload(null,false);  //just reload table
       
    });

});


function reload_table()
{

    table.ajax.reload(null,false); //reload datatable ajax 
}

</script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });




</script>
<script>
$(".export_to").on('click',function(){ 
var c_grp = $('#c_grp').val();
var ven_cd = $('#ven_cd').val();
var grp_cd = $('#grp_cd').val();
var filter_store = $('#filter_store').val();
var filter_kategori = $('#filter_kategori').val();
var date_start = $('#date_start').val();
var date_end = $('#date_end').val();

	//alert('export?');
	 $.ajax({

	 url :"<?php echo  base_url()?>/sales/export_it/",
     type: 'POST',
     data : {'c_grp': c_grp,'ven_cd':ven_cd,'grp_cd':grp_cd,'filter_store':filter_store,'filter_kategori':filter_kategori,'date_start':date_start,'date_end':date_end},

     beforeSend: function(){
              $('.export_to').text('Exporting..');
              $('.export_to').attr('disabled',true);

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

								                     $('.export_to').text('Export');
        											 $('.export_to').attr('disabled',false);

        											 //alert(obj['location']);
        											 window.open(''+obj['location']+'','_blank');
								          }


					if(message=='false') {

                	 	  PNotify.prototype.options.styling = "bootstrap3";
                          new PNotify({

                          title: 'Error',
                          text: obj['msg'],
                          type: 'error',
                          stack: {"dir1":"down", "dir2":"right", "push":"top"},
                          }); 

                         $('.export_to').text('Export');
         				 $('.export_to').attr('disabled',false);

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
         alert('False Exeption while request..');
         $('.export_to').text('Export');
         $('.export_to').attr('disabled',false);

           return false;
         }
	 });

});
</script>
