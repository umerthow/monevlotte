<div class="">

<div class="page-title">
    
<div id="example_wrapper"></div>
        
    </div>
     <div class="clearfix"></div>
      <div class="row">
        <div class="x_panel">
                  <div class="x_title">
                   <h2>Event White Spot : <small><?php if(!empty ($storex)) { echo $storex; } else { echo "--/--"; }  ?></small></h2>
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
                  <div class="form-group col-md-7">
                   <?php if ($this->session->userdata('level') == '3' ) {  ?>  

                    


                   <?php } else { ?>
                  <button class="btn btn-primary" id="loaddata"><span class="fa fa-plus"></span> Add Event</button>
                  <?php } ?>
                  </div> 
                  <form action="<?php echo site_url('white_spot/event_white_spot') ?>" method="POST" >
                      <div class="form-group col-md-4">
                        
                          
                          <select name="filter_store2" id="filter_store2" class="form-control">
                          <option value="" > ALL STORE </option> 
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
                       <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="filter_event">Filter</button>
                       </div>
                  </form>
                  </div>
                  <div id="list_order">
                    <table class="table table-hover" caption"Hello" id="example2" >
                      <thead>
                      <tr>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;"># </th>
                          <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Store Code</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Code</th>
                        <th class="warning col-md-3" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Product Name</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Stock</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Stok Value</th>
                        <th class="warning" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Reg</th>
                        <th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Harga Khusus</th>
                        <th class="info" style="border:thin solid #cacaca; vertical-align:middle; text-align: center;">Catatan</th>
                      </tr>
                    </thead>


                      <tbody>

                          <?php 

                           foreach ($list_evt as $result) { ?>
                        <tr>
                          <td style="border:thin solid #cacaca; text-align:center;"><a href="#" class="glyphicon glyphicon-trash" onclick="delete_event(<?php echo $result->noid ?>)"> </a></td>
                             <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->str_cd ?></td>
                          <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->prod_cd ?></td>
                          <td style="border:thin solid #cacaca; text-align:center;"><?php echo $result->prod_nm ?></td>
                          <td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->stk_qty,2,',',',') ?></td>
                          <td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->stk_camt,2,',',',') ?></td>
                          <td style="border:thin solid #cacaca; text-align:center;"><?php echo number_format($result->sale_prc,2,',',',') ?></td>
                          <td contenteditable="true" onBlur="saveToDatabase(this,'harga_hk','<?php echo $result->noid; ?>')" style="border:thin solid #cacaca; text-align:center;" onClick="showEdit(this);"><?php echo number_format($result->harga_hk,2,',',',')?></td>
                          <td contenteditable="true" type="number"  onBlur="saveToDatabase(this,'remaks','<?php echo $result->noid; ?>')" style="border:thin solid #cacaca; text-align:center;" onClick="showEdit(this);"><?php echo $result->remaks ?>
                            
                     
                          </td>

                        </tr>



                          <?php } ?>

                      </tbody>

                    </table>
                    </div>
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
                        <div class="form-group"><?php echo $form_store; ?></div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="form-group"><?php echo $form_kategori; ?></div>
                      </div>
                   
                       <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btn-filter">Filter</button>
                       </div>
               </div>     
             <br/>      

          <form  action="javascript:void(0)" id="frm-example">
          <table class="table  table-bordered  table-hover gridtable" id="table1" style="font-size:12px;margin-top: 10px; border:"2px";" framework="bootstrap">
          
               <thead>
              
                          <th class="info"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                          <th class="info text-center col-md-2" >prod_cd</th>
                          <th class="info text-center" >str_cd</th>
                          <th class="info text-center col-md-6" >prod_nm</th>
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
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
         </form>
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
                data.filter_storex = $('#filter_storex').val();
                data.filter_kategori = $('#filter_kategori').val();
               
              },

          },

    "pageLength": 10,
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], 

    "columnDefs": [
          { 
              "targets": [ 0 ], //last column
              "orderable": false, //set not orderable
              
          }
         

           ],  

    });

 $('#btn-filter').click(function(){ //button filter event click
    // $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' />");
        table.ajax.reload(null,false);  //just reload table
    });
  });


  // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });



   $('#table1 tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control 
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });


</script>

<script type="text/javascript">
  

   $('#frm-example').on('submit', function(e){
      var form = this;
      var str_cd = $('#filter_storex').val();
      // Iterate over all checkboxes in the table
  
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element 

               
               $(form).append(
                  $('<input>')
                     .attr('type', 'text')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         } 


           $.ajax({

    url :"<?php echo  base_url()?>/white_spot/insert_event_ws_chek/",
    data: $('#frm-example').serialize(),
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



<script>
$('#loaddata').on('click', function () {

//  alert('ok');

  $('#price_option').modal('show');

});
</script>



<script type="text/javascript">
$('#table1 tbody').on('dblclick', 'tr', function () {
var data = table.row( this ).data();
var prod_cd = data[1];
var str_cd = data[2];


 $.ajax({

    url :"<?php echo  base_url()?>/white_spot/insert_event_ws/",
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



<script>
 function delete_event(id){

 if(confirm('Are you sure delete this data?')) {
    $.ajax({
            url : "<?php echo  base_url()?>white_spot/delete_evt/"+id,
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


<script>

function showEdit(editableObj) {
      $(editableObj).css("background","#f4e6a8");
    } 
function saveToDatabase(editableObj,column,id) {
  $(editableObj).css("background","#f4e6a8 no-repeat right");
  $.ajax({
    url: "<?php echo site_url('white_spot/save_edit_evt')?>",
    type: "POST",
    data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
      $('#list_order').load(location.href + " #list_order");  
    }        
   });
}
</script>

