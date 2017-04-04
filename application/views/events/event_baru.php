<style type="text/css">
  .checkbox {
  position: relative;
  top: -1px;
}
</style>
<h1></h1>

<div class="">
            <div class="page-title">
              
             </div>
            <div class="clearfix"></div>

            <div class="row">
            
                <div class="x_panel ">
                  <div class="x_title">
                    <h2>Form Event baru <small>Silahkan pilih kategori product terlebih dahulu</small></h2>
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
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                   
                     <form action="<?php echo site_url('event/insert_evt')?>" method="post" class="form-horizontal" id ="demo-form" novalidate>

                   <div class="row">
                      <div class="item form-group col-md-6">
                         <label  for="event">Nama Event  <span class="required">*</span> </label>

                       <input type="text" id="ev_name" name="ev_name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>

                  <div class="row">
                  <div class="item form-group col-md-6">
                      <label for="email">Start event <span class="required">*</span></label>

                          
                          <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="8"  name="event_start" type="text" readonly >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         </div>
                        
                       


                  </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="email">End event <span class="required">*</span></label>

                          
                          <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                     <input class="form-control" size="8"  name="event_end" type="text" readonly >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         </div>
                        
                       


                  </div>




                  </div>

                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="kode">Kategori Product *   </label>
                        <div class="form-group"><?php echo $form_kategori; ?></div>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="kode">Product Code*   </label>
                        <input type="text" name="prod_cd"  id="prod_cd" class="form-control bs-callout-warning" value=""  placeholder=""  required="required" data-validate-length-range="4"/>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="kode">Price referens*   </label>
                        <input type="number" name="price_ref"  id="price_ref" class="form-control" value=""  placeholder="" required />
                      </div>

                     <div class="form-group col-md-3">
                          <button id="pilihprodkat" type="button" class="btn btn-success" style="margin-top:23px;"><a href="#event_info">Cari</a></button>
                     </div>
                    


                
                      

                  </div>


                 
                



                      <p id="demo2"><!--  <table class="table table-bordered nowrap table-hover gridtable" id="table_event" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">

                  <thead>
                     <tr>
                          <th bgcolor="#FFFFFF"  class=" info text-center" rowspan="2">#</th>
                          <th class="info text-center" rowspan="2">id_ev</th>
                          <th class="info text-center" rowspan="2">Prod cd</th>
                          <th class="info text-center" rowspan="2">Prod nm</th>
                          <th class="info text-center" rowspan="2">Vendor cd</th>

                           <th class="info text-center" rowspan="2">Buy Price</th>
                           <th class="info text-center" rowspan="2">Buy Inc Prc</th>
                            <th class="info text-center" rowspan="2">Sale Prc</th>
                           <th class="info text-center" rowspan="2">Cur Sale Prc</th>
                            <th class="info text-center" rowspan="2">Stok Qty</th>

                           <th class="info text-center " rowspan="2">Store cd</th>
                           <th class="info text-center" rowspan="2">Event promo</th>
                           <th class="info text-center" rowspan="2">Event price</th>
                           <th class="info text-center" rowspan="2">Event Detail</th>
                           <th class="info text-center" colspan="2">Periode</th>
                    </tr>
                    <tr>
                          <th class="info text-center">Start</th>
                          <th class="info text-center">Finish</th>
                      </tr>
                  </thead>
                   <tbody></tbody> 


                  </table> --></p>
                      <div id="event_info" class="hidden"> 
                      <span class="section">Info Store Price </span>
                     
                     <div class="form-group" id="test">

                     <div class="row">
                     


                         

                           <div class="item form-group">
                       
                        <div class="col-md-10 col-sm-10">
                        <div class="form-group">
                            
                             

                             <div id="storeshow">



                             </div>
                     

                        </div>
                           
                        </div>
                        
                        </div>


                     </div>
                     </div>
                    
                    <!--   <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 " for="email">Nama Event 
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="ev_name" name="ev_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->

                    
                    
                      
                  
                    
                       


               

                       
                    
                      <div class="item form-group">
                      
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="row">
                          <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12" placeholder="Deskripsi event"></textarea>
                        </div>
                        </div>
                      </div>
                       <h2><small>NB : Mohon Cheklist Store yang kan di Berikan Event</small></h2>
                      <div class="ln_solid"></div>
                      <div class="form-group" id="tomb_submit" >
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </div>
                 </form>


              


                   
                </div>
   
           </div>
       </div>    
       
</div>  
              


<script>
$(document).ready(function(){
var storeshow = $('#storeshow');

//$('#send').attr("disabled", "disabled").off('click');

  $('#pilihprodkat').on('click', function(e) {

    $('#demo2').show();
    var prod_cat =$('#filter_kategori').val();
    var prod_cd = $('#prod_cd').val();
    var prc_ref = $('#price_ref').val();
    

    $.ajax({

      url :"<?php echo  base_url()?>/event/store_location/",     
      data:{'prod_cd':prod_cd,'prod_cat':prod_cat,'ref_price': prc_ref},
      type: 'POST',
      cache: false,
      beforeSend: function(){

      $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
     

        storeshow.html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
       
      },
   

      success: function(data){


        $('#event_info').removeAttr( "class" );
                 $('#event_info').show();
                 $('#demo2').hide();
                 $('#event_info').fadeIn('slow');
                 storeshow.text('');
                 var i = 1;

                  storeshow.html(data);

      },


      error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }



    });


  });

});

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
var table ;

table = $('#table_event').DataTable({
  "processing": true, //Feature control the processing indicator.
  "serverSide": true, //Feature control DataTables' server-side processing mode.
  "order": [], //Initial no order.

   "ajax": {
            "url": "<?php echo site_url('event/ajax_list_all_events')?>",
            "type": "POST",
            "data":function (data){
              data.filter_prod = $('#prod_cd').val();
              data.filter_kategori = $('#filter_kategori').val();
            }
        },
  
 "pageLength": 15,
 "aLengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],  
  scrollY:        "200px",
  scrollX:        true,
   
   "columnDefs": [

            {
                "targets": [ 1 ],
                "visible": false
            },
            {
               "targets": [ 0 ], //last column
               "orderable": false, //set not orderable

            },

   ],

  "sScrollX": true,
  "sScrollXInner": "160%",
  fixedColumns:   {
            leftColumns: 3
        }

  });

  $('#pilihprodkat').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    })

</script>

<script>

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>