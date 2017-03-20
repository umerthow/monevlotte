
<div class="page-title">
    
<div id="example_wrapper"></div>
        
</div>

<div class="clearfix"></div>
<div class="row">
   <?php if($this->session->userdata('berhasil')) {?>
  
   <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
       <span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->userdata('berhasil') <> '' ? $this->session->userdata('berhasil') : ''; ?>
  </div>

    <?php
    } else if($this->session->userdata('eror')) { ?>

    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <span class="glyphicon glyphicon-exclamation-sign"></span> <?php echo $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
   </div>
     <?php
    }
    ?>

 <div class="x_panel">
                  <div class="x_title">
                    <h2>All Events <small>--/--</small></h2>
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
                  	<label>Pilih kategori:</label>
	               	 <div class="form-group"><?php echo $form_kategori; ?></div>
	                </div>

	                <div class="col-md-3">
                  	<label>Input product code :</label> 
	               	 <div class="form-group">
	               	 	<input type ="text" name="prod_cd" id="prod_cd" class="form-control" required="required" >
	               	 </div>
	                </div>

	                 <div class="col-md-3">
                  	<label> filter: </label>
	               	 <div class="form-group">
	               	 	<button type="button" class="btn btn-info" id="btn-filter"> Filter</button>
	               	 </div>

                   <div class="form-group">

                      </div>
	                </div>


                  	</form>
                    <br/>
                    </div>
              

                  <table class="table table-bordered nowrap table-hover gridtable" id="table_event" style="font-size:12px;margin-top: 10px; border:"2px" " framework="bootstrap">

                  <thead>
                     <tr>
                          <th bgcolor="#FFFFFF"  class=" info text-center" rowspan="2">#</th>
                          <th class="info text-center" rowspan="2">id_ev</th>
                          <th class="info text-center" rowspan="2">Prod cd</th>
                          <th class="info text-center" rowspan="2">Prod nm</th>
                              <th class="info text-center" rowspan="2">Vendor cd</th>
                          <th class="info text-center " rowspan="2">Store cd</th>
                          <th class="info text-center" rowspan="2">Event promo</th>
                           <th class="info text-center" rowspan="2">Event Detail</th>
                           <th class="info text-center" colspan="2">Periode</th>
                    </tr>
                    <tr>
                          <th class="info text-center">Start</th>
                          <th class="info text-center">Finish</th>
                      </tr>
                  </thead>
                   <tbody></tbody> 


                  </table>


                
               

          		</div>

 </div>



</div>

            <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true" id="event_edit">
                    <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Update Event ? <span  class="animate" id="demo2"></span></h4>
                        </div>
                          <div class="modal-body">

                           <form id="form_event_ops" data-parsley-validate class="form-horizontal form-label-left" >
                               <div class="form-group">
                               <input type="hidden" id="evt_code"  name="evt_code" class="form-control" placeholder="Disabled Input">
                                </div>

                                 <div class="form-group">
                                  <label class="control-label col-md-3">Product Code *</label>
                                   <div class="col-md-9 col-sm-9 col-xs-12">
                                   <input type="text" id="prod_x" name="prod_x" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                   </div>
                                </div> 

                                <div class="form-group">
                                 <label class="control-label col-md-3">Store Code*</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                  <input type="text" id="str_cd" name="str_cd" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                  </div>
                                 </div>


                                 <div class="form-group">
                                  <label class="control-label col-md-3">Event name *</label>
                                   <div class="col-md-9 col-sm-9 col-xs-12">
                                   <input type="text" id="ev_name" name="ev_name" required="required" class="form-control col-md-7 col-xs-12">
                                   </div>
                                </div>


                               

                                <div class="form-group">
                                  <label class="control-label col-md-3" for="email">Start event* <span class="required">*</span>
                                </label>
                                  
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                  <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="8"  name="event_start" id="event_start" type="text" readonly >
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                 </div>
                                 </div>
                                 <input type="hidden" id="dtp_input2" value="" /><br/>

                              </div>

                                <div class="form-group">
                                  <label class="control-label col-md-3" for="email">Finish event* <span class="required">*</span>
                                </label>
                                  
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                  <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="8"  name="event_end" id="event_end" type="text" readonly >
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                 </div>
                                 </div>
                                 <input type="hidden" id="dtp_input2" value="" /><br/>

                              </div>


                               <div class="form-group">
                               <label class="control-label col-md-3" for="textarea">Deskripsi Event <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                  <textarea id="detail_evt" required="required" name="detail_evt" row="5" class="form-control col-md-7 col-xs-12"></textarea>
                                </div>
                               </div>


                              
                               </form>

                          </div>


                            <div class="modal-footer">
                          <button type="button" class="btn btn-danger pull-left btn-delete" >Delete</button>  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary btn-process">Save changes</button>
                        </div>


                      </div>
                    </div>
</div>


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
  scrollY:        "400px",
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

  $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    })

</script>

<script>

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
</script>


<script>
$('#table_event tbody').on('dblclick', 'tr', function () {
     var data = table.row( this ).data();
     var cd_evt = data[1];

   $('.modal-title').text('Detail event :');
   $('#event_edit').modal('show');
   $('#evt_code').val(cd_evt);

   var kode = cd_evt;  
   $.ajax({
      url :"<?php echo  base_url()?>/event/edit_event/"+kode,
      type: 'GET',
      dataType: 'JSON',
      beforeSend: function(){
             $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");

            },
      success: function(data){
         try { 
           if (data.length < 0) {
             $('#demo2').hide();
             alert('data tidak ditemukan!');
              return false;
           } else {
                   $('#demo2').hide();
                  $('#ev_name').val(data.nama_event);
                  $('#prod_x').val(data.prod_cd);
                  $('#str_cd').val(data.str_cd);
                  $('#event_start').val(data.start_date);
                  $("#event_end").val(data.finish_date);
                  $("#detail_evt").val(data.detail_event);
           
           }



         } catch(e) { 

          alert('Exception while request..');

        }  


      },

      error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }



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
$('#event_edit').on('click', '.btn-process', function(e) {
  $('.btn-process').text('saving..');
  $('.btn-process').attr('disable',true);
    $.ajax({

           url: "<?php echo  base_url()?>/event/proc_updateevent",
           type:"POST",
           data: $('#form_event_ops').serialize(),
           cache: false,
           
           success: function(json) {
                var obj = jQuery.parseJSON(json);
                var a = obj['STATUS'];

                try{    

                  if (a =='true') {
                   $('#event_edit').modal('hide');
                     PNotify.prototype.options.styling = "bootstrap3";
                    new PNotify({
                    title: 'Successfully',
                    text: 'Success updating data.',
                    type: 'success',
                    stack: {"dir1":"down", "dir2":"right", "push":"top"},
                    });


                    $('#form_event_ops')[0].reset();
                    table.ajax.reload(null,false);  //just reload table
                     $('.btn-process').text('Save changes'); //change button text
                     $('.btn-process').attr('disabled',false); //set button enable 
                     return false;

                  } if(a == 'false') {

                     alert('Gagal Updating Data!  ');
                     $('.btn-process').text('Save changes'); //change button text
                     return false;
                  }


                }catch(e) { 
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
                    $('.btn-process').attr('disabled',false); //set button enable 
                    $('.btn-process').text('Save changes'); //change button text
                  },




    });

  });

</script>

<script>
$('#event_edit').on('click', '.btn-delete', function(e) {

var kodex = $('#evt_code').val();

  if(confirm('Are you sure delete this data?'))
    {
         
          $.ajax({
            url : "<?php echo  base_url()?>event/ajax_delete/"+kodex,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
             PNotify.prototype.options.styling = "bootstrap3";
              new PNotify({
              title: 'Notification',
              text: 'Sukses Delete This Data.',
              type: 'success',
              stack: {"dir1":"down", "dir2":"right", "push":"top"},
              });  

               $('#event_edit').modal('hide');
               $('#form_event_ops')[0].reset();
                reload_table();

            }, error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }


        });
    }
  });
</script>