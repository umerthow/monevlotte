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
                   
                     <form action="<?php echo site_url('event/insert_evt')?>" method="post" class="form-horizontal" novalidate>

                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="kode">Kategori Product *   </label>
                        <div class="form-group"><?php echo $form_kategori; ?></div>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="kode">Product Code*   </label>
                        <input type="text" name="prod_cd"  id="prod_cd" class="form-control" value=""  placeholder="" required />
                      </div>

                     <div class="form-group col-md-3">
                          <button id="pilihprodkat" type="button" class="btn btn-success" style="margin-top:23px;">Pilih</button>
                     </div>
                    

                  </div>
                 



                      <p id="demo2"></p>
                      <div id="event_info" class="hidden"> 
                      <span class="section">Event  Info</span>

                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nama Event <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="ev_name" name="ev_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Location*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                             <p style="padding: 5px;">
                            <div id="storeshow">
                                 <input type="checkbox" name="hobbies[]" id="hobby2" value="run" class="flat" /> Running
                        <br />

                               <input type="checkbox" name="hobbies[]" id="sdfg" value="run" class="flat" /> Running
                             <br />

                            </div>
                            </p>
                        </div>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Start event <span class="required">*</span>
                        </label>
                          <div class="col-md-6">
                          <div class="control-group">
                          <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="8"  name="event_start" type="text" readonly >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         </div>
                         </div>
                         <input type="hidden" id="dtp_input2" value="" /><br/>
                         </div>
                       

                        </div>

               

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="email">End event <span class="required">*</span>
                        </label>
                       
                          <div class="col-md-6">
                          <div class="control-group">
                          <div class="input-group date form_date form_date col-md-6 " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="8"  name="event_end" type="text" readonly >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                         </div>
                         </div>
                         <input type="hidden" id="dtp_input2" value="" /><br/>
                         </div>

                        

                      
                      </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi Event <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
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
    

    $.ajax({

      url :"<?php echo  base_url()?>/event/store_location/",     
      data:{'prod_cd':prod_cd,'prod_cat':prod_cat },
      type: 'POST',
      dataType:'json',
      cache: false,
      beforeSend: function(){

      $('#demo2').html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
     

        storeshow.html("<img height='20px' width='20px' src='<?php echo base_url()?>/assets/default.gif' /> Loading..");
       
      },
   

      success: function(data){
        try {  
                if (data.length == 0) {

                  alert('data product dan kategori tidak ditemukan!');
                  $('#demo2').text('Mohon cek product code dan kategori.');
                  $('#event_info').hide();
                  return false;

                } else {
                 $('#event_info').removeAttr( "class" );
                 $('#event_info').show();
                 $('#demo2').hide();
                 $('#event_info').fadeIn('slow');
                 storeshow.text('');
                 var i = 1;
                 $.each(data, function(key,value) {
                     
                     

                          storeshow.append("<input type='checkbox' name='options[][str_cd]' id='str_cd' value="+ value.str_cd+" class='flat' style='padding:10px' />" + value.str_nm + "" );
                     

                       storeshow.append('<br/>');
               });

                }


        }catch(e) { 

          alert('Exception while request..');

        }  


       

         

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


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

</script>
